<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return redirect('')->route('admin.users.index');
    }

    public function delete($id) {
        User::find($id)->delete();
        return redirect('')->route('admin.users.index');
    }
}
