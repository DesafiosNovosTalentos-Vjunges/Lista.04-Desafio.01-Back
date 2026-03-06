<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService {

    public function register(array $data){

        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
    }

    public function login(array $credentials){
        
        if(!Auth::attempt($credentials)){
            throw ValidationException::WithMessages([
                'email'=> ['As informações inseridas estão incorretas!!'],
            ]);
        }

        return Auth::user();
    }
}
