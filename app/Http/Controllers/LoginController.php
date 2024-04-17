<?php

namespace App\Http\Controllers;



use Illuminate\View\View;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function show(): View {
        return view("auth.login");
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only("email","password");
        // Thử xác thực người dùng
        if (Auth::attempt($credentials)) {
            // Xác thực thành công, người dùng đã đăng nhập
            // Thực hiện hành động tiếp theo sau khi đăng nhập thành công
            return redirect()->intended('/');
        } else {
            // Xác thực thất bại, email hoặc password không chính xác
            // Hiển thị thông báo lỗi hoặc đưa người dùng quay lại trang đăng nhập
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
}
