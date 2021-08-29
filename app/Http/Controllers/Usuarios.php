<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Use App\Models\Usuario;

class Usuarios extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function getUsuario(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();
        if(!$usuario) return response()->json(['message' => 'Email não existente em nosso Banco de Dados'], 203);
        return response()->json($usuario);
    }


}
