<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        // $credentials = $request->only(['email', 'password']);
        // if (! $token = auth('api')->attempt($teste)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        $user = Usuario::where('Email', $request->email)->first();

        if(!$user) return response()->json(['error' => 'Unauthorized'], 401);

        $token = auth()->login($user);

        return $this->respondWithToken($token);

    }


    /**
     * Create a new User
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|unique:Usuarios,email'
        ]);

        $usuario = new Usuario();
        $usuario->email = $request->email;
        $usuario->password = Hash::make('100Caspa');
        $usuario->Nome = $request->nome;
        $usuario->Data_nascimento = $request->data_nascimento;
        $usuario->Sexo = $request->sexo;
        $usuario->ativo = true;
        $usuario->save();

        return response()->json($usuario);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
