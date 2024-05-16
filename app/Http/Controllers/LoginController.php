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
            $user = Auth::user(); // Lấy thông tin người dùng sau khi đăng nhập

            // Kiểm tra vai trò của người dùng và chuyển hướng tương ứng
            if ($user->role === 1) {
                // Nếu role = 1 (admin), chuyển hướng đến trang admin
                return redirect()->route('admin.categories.index');
            } else {
                // Nếu role = 0 hoặc khác (người dùng thông thường), chuyển hướng đến trang home
                return redirect()->route('home.index');
            }
        } else {
            // Xác thực thất bại, email hoặc password không chính xác
            // Hiển thị thông báo lỗi hoặc đưa người dùng quay lại trang đăng nhập
            return back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không hợp lệ!!!']);
        }
    }
}
