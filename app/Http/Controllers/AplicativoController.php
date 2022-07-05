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
}
