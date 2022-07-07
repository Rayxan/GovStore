<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function auth(Request $request){

        $request->password = bcrypt($request->password);

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ],[
          'email.required' => 'E-mail é obrigatório',  
          'password.required' => 'Senha é obrigatória'  
        ]);
     
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            dd('Logou');
        }else{
            echo ($request->email);
            echo " ";
            echo ($request->password);
        }
    }
}
