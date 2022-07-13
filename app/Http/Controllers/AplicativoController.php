<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aplicativo;
use App\Models\User;

class AplicativoController extends Controller
{
    public function index()
    {
        //Retorna todos os aplicativos salvos no banco
        $aplicativos = Aplicativo::all();

        return view(
            'welcome',
            [
                'aplicativos' => $aplicativos,
            ]
        );
    }

    public function create()
    {
        return view('aplicativos.create');
    }

    public function store(Request $request)
    {
        $aplicativo = new Aplicativo;

        $aplicativo->nm_nome = $request->nm_nome;
        $aplicativo->ds_link = $request->ds_link;
        $aplicativo->ds_descricao = $request->ds_descricao;
        $aplicativo->tp_tipo_app = $request->tp_tipo_app;
        $aplicativo->tp_status = "PEN";

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/aplicativos'), $imageName);

            $aplicativo->image = $imageName;
        }

        $user = auth()->user();
        $aplicativo->user_id = $user->id;

        $aplicativo->save();

        return redirect('/')->with('msg', 'Aplicativo enviado para aprovação!');
    }


    public function show($id)
    {
        $aplicativo = Aplicativo::findOrFail($id);

        $aplicativoOwner =  User::where('id', $aplicativo->user_id)->first()->toArray();

        return view('aplicativos.show', ['aplicativo' => $aplicativo, 'aplicativoOwner' => $aplicativoOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        
        $aplicativos = $user->aplicativos;

        $userAdmin = auth()->user()->admin;

        if($userAdmin){
            $aplicativos = Aplicativo::all();
        }
        
        return view('aplicativos.dashboard', ['aplicativos' => $aplicativos, 'userAdmin' => $userAdmin]);
    }

    public function destroy($id)
    {
        Aplicativo::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso');
    }

    public function edit($id)
    {
        $aplicativo = Aplicativo::findOrFail($id);

        return view('aplicativos.edit', ['aplicativo' => $aplicativo]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // Retorna se o usuário é adm
        $userAdmin = auth()->user()->admin;
        
        if($userAdmin){
            $data['tp_status'] = "APV";
        }else{
            $data['tp_status'] = "PEN";
        }

        // Image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/aplicativos'), $imageName);

            $data['image'] = $imageName;
        }

        Aplicativo::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso');
    }
}
