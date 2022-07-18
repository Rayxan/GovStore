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

    // Método usado para criar um aplicativo
    public function store(Request $request)
    {
        $aplicativo = new Aplicativo;

        $aplicativo->nm_nome = $request->nm_nome;
        $aplicativo->ds_link = $request->ds_link;
        $aplicativo->ds_descricao = $request->ds_descricao;
        $aplicativo->tp_tipo_app = $request->tp_tipo_app;
        $aplicativo->tp_status = "PEN";

        $userAdmin = auth()->user()->admin;

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

    // Método usado para mostrar informações de um aplicativo
    public function show($id)
    {
        $aplicativo = Aplicativo::findOrFail($id);

        $aplicativoOwner =  User::where('id', $aplicativo->user_id)->first()->toArray();

        return view('aplicativos.show', ['aplicativo' => $aplicativo, 'aplicativoOwner' => $aplicativoOwner]);
    }

    // Método utilizado para exibir lista de aplicativos cadastrados e sob pendências
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

    // Método usado para excluir um aplicativo
    public function destroy($id)
    {
        Aplicativo::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Aplicativo excluído com sucesso');
    }

    // Método usado para editar um aplicativo
    public function edit($id)
    {
        $aplicativo = Aplicativo::findOrFail($id);

        $userAdmin = auth()->user()->admin;

        if($userAdmin && ($aplicativo->tp_status == "APV")){
            $aplicativo->tp_status = "ATU"; 
        }

        if(!$userAdmin && ($aplicativo->tp_status == "APV")){
            $aplicativo->tp_status = "PEN"; 
        }

        if(!$userAdmin && ($aplicativo->tp_status == "PEN")){
            $aplicativo->tp_status = "PEN"; 
        }

        if(!$userAdmin && ($aplicativo->tp_status == "ATU")){
            $aplicativo->tp_status = "ANT"; 
        }

        $aplicativo->save();

        return view('aplicativos.edit', ['aplicativo' => $aplicativo, 'userAdmin' => $userAdmin]);
    }

    // Método utilizado para atualizar um aplicativo
    public function update(Request $request)
    {
        $data = $request->all();

        // Retorna se o usuário é adm
        $userAdmin = auth()->user()->admin;

        // Se o usuário estiver solicitando alteração o status passa a ser pendente
        if($userAdmin){
            $data['tp_status'] = "ATU";
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
        
        // Se o status for 'Pendente' quer dizer que o usuário está solicitando alteração,
        // logo, é criado um novo registro na tabela.
        if($data['tp_status'] == "PEN"){
            $user = auth()->user();
            $data['user_id'] = $user->id;

            Aplicativo::findOrFail($request->id)->create($data);
            
            return redirect('/dashboard')->with('msg', 'Aplicativo enviado para aprovação!');
        }else{
            Aplicativo::findOrFail($request->id)->update($data);
            return redirect('/dashboard')->with('msg', 'Aplicativo editado com sucesso!');
        }

    }

    // Método usado para trocar o status do aplicativo e aparecer o botão de solicitação de exclusão
    public function aparecerExcluir($id){
        
        $aplicativo = Aplicativo::findOrFail($id);

        $aplicativo->tp_status = "EXC";

        $aplicativo->save();

        return redirect('/dashboard')->with('msg', 'Aplicativo solicitado para exclusão com sucesso!');
    }
}

