<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->with('swal-success', 'خوش آمدید');
        }
        return redirect()->route("login");
    }

    public function edit()
    {
        return view('update-profile');
    }


    public function update(Request $request)
    {
        DB::update('update users set email = ?, password = ?', [$request->email, $request->password]);
        return redirect()->route('home')->with('swal-success', 'پروفایل شما با موفقیت ویرایش شد');
    }

    public function registerCreate()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route("home")->with('swal-success', 'کاربر با موفقیت اضافه شد');
    }
}
