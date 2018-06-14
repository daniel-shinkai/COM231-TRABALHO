<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Hash;
use Redirect;

class LoginController extends Controller
{
    public function processData(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        $usuario = Usuario::where('email', $email)->get()->first();        

        if (Hash::check($password, $usuario->senha ))
        {
            echo 'Login realizado com sucesso';
        }
        else {
            echo 'erro no login';
        }
    }

    public function createAccount(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $password = Hash::make($password);

        $usuario = new Usuario;

        $usuario->email = $email;
        $usuario->senha = $password;

        $usuario->save();

        Redirect::route('/home',array('param1' => ""));

    }
}
