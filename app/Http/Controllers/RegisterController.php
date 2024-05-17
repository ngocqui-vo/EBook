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
      
        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = 0;

        
        if($request->hasFile('image'))
        {
            // $file = $request->file('image');
            // $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            // $filename = time().'.'.$ex;
            // $file->move('assets/storage/',$filename);
            // $data['image'] = $filename;
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }
        $user->save();

        return redirect()->route('home.index');
    }
}
