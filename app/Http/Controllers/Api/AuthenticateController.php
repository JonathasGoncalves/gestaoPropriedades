<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use App\API\ApiError;

class AuthenticateController extends Controller
{

    /** 
     * /@var JwtAuth
     */
    private $jwtauth;


    public function __construct(JwtAuth $jwtauth)
    {
        $this->jwtauth = $jwtauth;
    }

    public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('usuario', 'password');

        // attempt to verify the credentials and create a token for the user
        if (!$token = $this->jwtauth->attempt($credentials)) {
            return response()->json(['error' => 'Credencial Inválida'], 401);
        }

        // all good so return the token
        $user = $this->jwtauth->user();
        return response()->json([
            'usuario' =>  $user,
            'token' => $token,
        ]);
        //return response()->json($user);
    }


    public function me()
    {

        if (!$user = $this->jwtauth->parseToken()->authenticate()) {
            return response()->json(['error' => 'Usuário não encontrado!'], 404);
        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function refresh()
    {
        $token = $this->jwtauth->getToken();
        $token = $this->jwtauth->refresh($token);

        return response()->json(compact('token'));
    }

    public function logout()
    {
        $token = $this->jwtauth->getToken();
        $this->jwtauth->invalidate($token);

        return response()->json(['Logout realizado com sucesso!']);
    }
}
