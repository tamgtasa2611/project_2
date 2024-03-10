<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        $data = [
            'rooms' => $rooms,
        ];

        return view('admin.rooms.index', $data);
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(StoreRoomRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'base_price', $request->base_price);

            Room::create($data);
            return to_route('admin.rooms')->with('success', 'Room type created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Room $roomType)
    {
        return view('admin.rooms.edit', [
            'roomType' => $roomType
        ]);
    }

    public function update(UpdateRoomRequest $request, Room $roomType)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'base_price', $request->base_price);

            $roomType->update($data);
            return to_route('admin.rooms')->with('success', 'Room type updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $roomType = Room::find($id);
        //Xóa bản ghi được chọn
        $roomType->delete();
        //Quay về danh sách
        return to_route('admin.rooms')->with('success', 'Room type deleted successfully!');
    }

    // PDF
    public function downloadPDF()
    {
        $rooms = Room::all();

        $pdf = PDF::loadView('admin.rooms.pdf', array('rooms' => $rooms))
            ->setPaper('a4', 'portrait');

        return $pdf->stream();
    }
}
