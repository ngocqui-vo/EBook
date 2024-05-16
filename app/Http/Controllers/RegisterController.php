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

        $data = $request->all();
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('assets/storage/',$filename);
            $data['image'] = $filename;

        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'image' => $data['image'],
        ]);
        auth()->login($user);
        return redirect()->route('home.index');
    }
}
