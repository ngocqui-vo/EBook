<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(2);
        return view('admin.user-list',['users' => $users]);
    }

    public function create() {
        return view('admin.user-create');
    }

    public function store(Request $request) {
        try {
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->role = 0;
            if ($request->hasFile('image')) {
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
        } catch (Exception) {
            return view('erorrs.register-fail');
        }
    }

    public function edit($id) {
        $user = User::find($id);
        if ($user) {
            return view('admin.user-edit',['user'=> $user]);
        } else {            
            echo "<script>alert('Không có user này!!');</script>";
            return redirect()->route('admin.users.index');
        }
        
        
    }

    public function update(Request $request) {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
    

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('image')) {
    
            // $file = $request->file('image');
            // $extension = $file->getClientOriginalExtension();
            // $filename = time() . '.' . $extension;
            // $file->move('assets/storage/', $filename);
            // $user->image = $filename;
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }
    
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
            'confirm_password' => 'required|same:new_password'
        ]);
        $user = auth()->user();
        if ($user && Hash::check($request->input('old_password'), $user->password)) {
            $user->password = $request->input('new_password');
            $user->save();
            return view('auth.change-password-success');
        }
        return back()->withErrors(['old_password' => 'Password invalid']);
    }
}
