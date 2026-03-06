<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    protected $auth_service;

    public function __construct(AuthService $auth_service){

        $this->auth_service = $auth_service;
    }

    public function register(Request $request){

        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ]);

        $user = $this->auth_service->register($data);
        $token = $user->createToken('auth_token')->plain_text_token;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
        ], 201);
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);

        $user = $this->auth_service->login($credentials);
        $token = $user->create_token('auth_token')->plain_text_token;

        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
        ]);
    }

    public function logout(Request $request){

        $request->user()->current_access_token()->delete();
        return response()->no_content();
    }
}
