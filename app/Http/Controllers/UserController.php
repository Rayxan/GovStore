<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function editPerfil($id){
        $user = User::findOrFail($id);

        return view('perfil.edit-perfil', ['user' => $user]);
    }

    public function updatePerfil(Request $request){
        $data = $request->all();

        User::findOrFail($request->id)->update($data);
        
        return redirect('/')->with('msg', 'Perfil editado com sucesso!');
    }
}
