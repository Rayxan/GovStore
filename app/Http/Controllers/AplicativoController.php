<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aplicativo;

class AplicativoController extends Controller
{
    public function index() {
     
        //Retorna todos os aplicativos salvos no banco
        $aplicativos = Aplicativo::all();
    
        return view('welcome', 
            [
               'aplicativos' => $aplicativos,
            ]);
    }

    public function create(){
        return view('aplicativos.create');
    }

    public function store(Request $request) {

        $aplicativo = new Aplicativo;

        $aplicativo->nm_nome = $request->nm_nome;
        $aplicativo->ds_link = $request->ds_link;
        $aplicativo->ds_descricao = $request->ds_descricao;
        $aplicativo->tp_tipo_app = $request->tp_tipo_app;

        $aplicativo->save();

        return redirect('/')->with('msg', 'Aplicativo enviado para aprovação!');
    }
}
