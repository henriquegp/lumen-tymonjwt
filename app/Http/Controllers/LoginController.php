<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth 
     */
    protected $jwt;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function login(Request $request){
        $token = $this->jwt->attempt([
            'NomeUsuario' => $request->input('login'),
            'password' => $request->input('senha')
        ]);

        if(!$token)
            return response()->json(['message' => 'Usuário ou senha invalida!'], 400);

        return response()->json($token);
    }

    public function senha(){
        return Hash::make('123');
    }
}
