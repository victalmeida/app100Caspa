<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// use Tymon\JWTAuth\Facades\JWTAuth;


use App\Models\UsuariosConfiguracao;

class UsuariosConfiguracoes extends Controller
{


        public function __construct()
        {
            $this->middleware('auth:api', ['except' => []]);
        }


    /**
    * Store a Usarios Congiuraçoes And Return DataSave.
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function store(Request $request)
    {

        $configuracao = new UsuariosConfiguracao();

        $configuracao->usuario_id =  $request->id;
        $configuracao->configuracao = json_encode($request->configuracao);
        $configuracao->save();

        return response()->json($configuracao);
    }


    /**
    * Return  Usuario Configuração from User.
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function get(Request $request)
    {

        return response()->json(auth()->user());

        $configuracao = new UsuariosConfiguracao();

        return response()->json($configuracao);
    }


}




