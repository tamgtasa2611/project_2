<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $paginationNum = 5;
        if ($request->pagination_num) {
            $paginationNum = $request->pagination_num;
        }

        $search = "";
        if ($request->search) {
            $search = $request->search;
        }

        $guests = Guest::where('first_name', 'like', '%' .  $search . '%')
            ->orWhere('first_name', 'like', '%' .  $search . '%')
            ->paginate($paginationNum)
            ->withQueryString();

        $data = [
            'guests' => $guests,
            'search' => $search,
            'paginationNum' => $paginationNum
        ];

        return view('admin.guests.index', $data);
    }

    public function create()
    {
        return view('admin.guests.create');
    }

    public function store(StoreGuestRequest $request)
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
            return to_route('admin.guests')->with('success', 'Guest created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Guest $guest)
    {
        return view('admin.guests.edit', [
            'guest' => $guest
        ]);
    }

    public function update(UpdateGuestRequest $request, Guest $guest)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'first_name', $request->first_name);
            $data = Arr::add($data, 'last_name', $request->last_name);
            $data = Arr::add($data, 'email', $request->email);
            $data = Arr::add($data, 'password', Hash::make($request->password));
            $data = Arr::add($data, 'phone_number', $request->phone);
            $data = Arr::add($data, 'status', $request->status);
            $guest->update($data);
            return to_route('admin.guests')->with('success', 'Guest updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(Guest $guest)
    {
        //Xóa bản ghi được chọn
        $guest->delete();
        //Quay về danh sách
        return to_route('admin.guests')->with('success', 'Guest deleted successfully!');
    }
}
