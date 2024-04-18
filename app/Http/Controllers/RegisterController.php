<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show() {
        return view("auth.register");
    }

    public function register(Request $request) {
      
        // $request->validate([
        //     "email" => "required|email:rfc,dns|unique:users,email",
        //     "name" => "required|string",
        //     "password" => "required|min:3",
        //     "password_confirmation" => "required|same:password",          
        // ]);
        $email = $request->input("email");
        $e = $request->email;
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);
        auth()->login($user);
        return redirect('')->route('home.index');
    }
}