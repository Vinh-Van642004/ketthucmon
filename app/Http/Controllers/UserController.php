<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('dangky');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/dangnhap')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function showLoginForm()
    {
        return view('dangnhap');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect()->route('index');
        } else {
            return redirect('/dangnhap')->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng.']);
        }
    }
    public function logout(Request $request)
{
    Session::forget('user');
    return redirect('/dangnhap');
}
public function customLogout(Request $request)
{
    Session::forget('admin');
    return redirect('admin/login');
}
public function edit()
{
    $user = Session::get('user');
    return view('user.edit', compact('user'));
}

public function update(Request $request)
{
    $user = User::find(Session::get('user')->id);

    $user->name = $request->input('name');
    $user->gender = $request->input('gender');
    $user->email = $request->input('email');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->note = $request->input('note');
    
    $user->save();

    // Cập nhật lại session
    Session::put('user', $user);

    return redirect()->route('orders.my')->with('success', 'Thông tin cá nhân đã được cập nhật!');
}

}
