<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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

        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->with('swal-success', 'خوش آمدید');
        } else {
            return redirect()->route('login')->with('swal-error', 'دوباره کوشش کنید.');
        }
    }

    public function edit()
    {
        return view('update-profile');
    }


    public function update(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password) && $request->email == Auth::user()->email) {
            DB::update('update users set email = ?, password = ?', [$request->email, Hash::make($request->new_password)]);
            return redirect()->route('home')->with('swal-success', 'پروفایل شما با موفقیت ویرایش شد');
        } else if ($request->email != Auth::user()->email) {
            return redirect()->back()->with('swal-error', 'ایمیل نادرست میباشد.');
        } else {
            return redirect()->back()->with('swal-error', 'رمز عبور قبلی نادرست میباشد.');
        }
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
            'password_confirmation' => 'required|min:6',
        ]);

        if ($request->password === $request->password_confirmation) {
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route("home")->with('swal-success', 'کاربر با موفقیت اضافه شد');
        } else {
            return redirect()->back()->with('swal-error', 'رمز عبور باهم مطابقت ندارد.');
        }
    }
}
