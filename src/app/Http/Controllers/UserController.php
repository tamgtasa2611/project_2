<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
//    login logout register
    public function login()
    {
        return view('customer.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        //check db
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //Lấy thông tin của customer đang login
            $user = Auth::user();
            //Cho login
            Auth::login($user);
            //Ném thông tin user đăng nhập lên session
            session(['user' => $user]);
            return to_route('customer.home')->with('success', 'Sign in successfully!');
        }
        return to_route('customer.login')->with('failed', 'Wrong email or password!')->withInput($request->input());
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('customer.logout');
    }

    public function register()
    {
        return view('customer.signup');
    }

    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|max:13',
        ]);

        if ($validated) {
            $arr = [];
            $arr = Arr::add($arr, 'first_name', $request->first_name);
            $arr = Arr::add($arr, 'last_name', $request->last_name);
            $arr = Arr::add($arr, 'email', $request->email);
            $arr = Arr::add($arr, 'password', $request->password);
            $arr = Arr::add($arr, 'phone_number', $request->phone);
            User::create($arr);
            return to_route('customer.login')->with('success', 'Account created successfully!');
        } else {
            return to_route('customer.register')->with('failed', 'Something went wrong!');
        }
    }

//    login logout register

//  profile
    public function profile()
    {
        return view('customer.profile.index');
    }

    public function myBooking()
    {
        return view('customer.profile.index');
    }

    public function editAccount()
    {
        return view('customer.profile.index');
    }

    public function changePassword()
    {
        return view('customer.profile.index');
    }
//    profile
}
