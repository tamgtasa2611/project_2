<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class GuestController extends Controller
{
    //    login logout register
    public function login()
    {
        return view('guest.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        //check account status
        //0 = locked
        //1 = active
        $guestEmail = $credentials['email'];
        $accountStatus = Guest::where('email', '=', $guestEmail)->first()->status;
        if ($accountStatus == 0) {
            return to_route('guest.login')->with('failed', 'This account has been locked!')->withInput($request->input());
        }
        //check account trong db
        if (Auth::guard('guest')->attempt($credentials)) {
            $request->session()->regenerate();
            //Lấy thông tin của guest đang login
            $guest = Auth::guard('guest')->user();
            //Cho login
            Auth::guard('guest')->login($guest);
            //Ném thông tin user đăng nhập lên session
            session(['guest' => $guest]);
            return to_route('guest.profile')->with('success', 'Sign in successfully!');
        }
        return to_route('guest.login')->with('failed', 'Wrong email or password!')->withInput($request->input());
    }

    public function logout(Request $request)
    {
        Auth::guard('guest')->logout();
        session()->forget('guest');
        return view('guest.logout');
    }

    public function register()
    {
        return view('guest.signup');
    }

    public function registerProcess(StoreGuestRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'first_name', $request->first_name);
            $data = Arr::add($data, 'last_name', $request->last_name);
            $data = Arr::add($data, 'email', $request->email);
            $data = Arr::add($data, 'password', Hash::make($request->password));
            $data = Arr::add($data, 'phone_number', $request->phone);
            $data = Arr::add($data, 'status', 1);
            Guest::create($data);
            
            return to_route('guest.login')->with('success', 'Account created successfully!');
        } else {
            return to_route('guest.register')->with('failed', 'Something went wrong!');
        }
    }

    //    login logout register

    //  profile
    public function profile()
    {
        return view('guest.profile.index');
    }

    public function myBooking()
    {
        return view('guest.profile.index');
    }

    public function editAccount()
    {
        $guestId = Auth::guard('guest')->id();
        $guest = Guest::find($guestId);
        return view('guest.profile.editAccount', [
            'guest' => $guest
        ]);
    }

    public function updateAccount(Request $request)
    {
        $guestId = Auth::guard('guest')->id();
        $guest = Guest::find($guestId);

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|max:255|unique:guests,email,' . $guestId,
            // lay id guest de bo qua unique cho email cua guest dang edit
            'phone' => 'required|max:20',
        ]);

        if ($validated) {
            $imagePath = "";
            //Kiểm tra nếu đã chọn ảnh thì Lấy tên ảnh đang được chọn
            //không chọn ảnh thì sẽ lấy tên ảnh cũ trên db
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
            } else {
                $imagePath = $guest->image;
            }
            //Kiểm tra nếu file chưa tồn tại thì lưu vào trong folder code
            if (!Storage::exists('public/admin/guest/' . $imagePath)) {
                Storage::putFileAs('public/admin/guest/', $request->file('image'), $imagePath);
            }
            $data = [];
            $data = Arr::add($data, 'first_name', $request->first_name);
            $data = Arr::add($data, 'last_name', $request->last_name);
            $data = Arr::add($data, 'email', $request->email);
            $data = Arr::add($data, 'phone_number', $request->phone);
            $data = Arr::add($data, 'image', $imagePath);
            $guest->update($data);

            return to_route('guest.editAccount')->with('success', 'Update account successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function changePassword()
    {
        return view('guest.profile.changePassword');
    }
    //    profile
}
