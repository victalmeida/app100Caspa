<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Use App\Models\Usuario;

class Usuarios extends Controller
{
    /**
     * Execute a JWT Middleware
     *
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store', 'getUsuario']]);
    }

    /**
     * Create a new User
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:Usuarios,email'
        ]);

        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->password = Hash::make('100Caspa');
        if($request->nome && !empty($request->nome) ) $usuario->Nome = $request->nome;
        if($request->data_nascimento && !empty($request->data_nascimento)) $usuario->Data_nascimento = $request->data_nascimento;
        if($request->sexo && !empty($request->sexo)) $usuario->Sexo = $request->sexo;
        $usuario->ativo = true;
        $usuario->save();

        return response()->json($usuario);
    }

    /**
    * Return all Properties of a Loged User in a estance of a Request Response.
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function getUsuario(Request $request)
    {
       $usuario = Usuario::where('email', $request->email)->first();
       if(!$usuario) return response()->json(['message' => 'Email não existente em nosso Banco de Dados'], 203);
       return response()->json($usuario);
    }


}
