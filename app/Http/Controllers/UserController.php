<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.user-list',['users' => $users]);
    }

    public function create() {
        return view('admin.user-create');
    }

    public function store(Request $request) {
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);
        return redirect('')->route('admin.users.index');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user-edit',['user'=> $user]);
    }

    public function update(Request $request) {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect()->route('admin.users.index');
    }

    public function center() {
        $user = auth()->user();
        $carts = $user->carts;

        $total = 0;
        $total_price = 0;
        foreach($carts as $cart) {
            $total += $cart->totalItems();
            $total_price += $cart->totalPrice();
        }
        
        return view('center', ['user' => $user]);
    }

    public function changePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $user = auth()->user();
        if ($user && Hash::check($request->input('old_password'), $user->password)) {
            $user->password = $request->input('new_password');
            $user->save();
            return view('auth.change-password-success');
        }
        return redirect()->route('home.index');
    }
}
