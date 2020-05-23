<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
     // Register user  
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        try {   
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

             return response()->json(['user' => $user, 'message' => 'USER CREATED SUCCESSFULY'], 201); // msge success !

        } catch (\Exception $e) {
           
            return response()->json(['message' => ' Failed! CREATION'], 409); // error message
        }
    }
    
    // Login user
    public function login(Request $request)
    {
          //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
        
    }



}