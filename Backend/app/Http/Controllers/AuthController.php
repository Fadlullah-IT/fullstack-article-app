<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([      //validate user input
            'name' => 'required |max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($fields); // creates new user 

        $token = $user->createToken($request->name); //create access token(sanctum)

        return [     //return both user and token to the frontend for storage
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users', //exists in db 
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();  // Get user where email matches the one entered

        if (!$user || !Hash::check($request->password, $user->password)) { //hash check 
            return [
                'errors' => [
                    'email' => ['the provided credentials are incorrect.']
                ]
            ];
        }


        $token = $user->createToken($user->name); //new sctm token for future requests.

        return [
            'user' => $user,
            'token' => $token->plainTextToken

        ]; //return 


    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); //delete token ->C.user

        return [
            'message' => 'You are logged out.'
        ];
    }
}
