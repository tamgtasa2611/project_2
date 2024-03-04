<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Barryvdh\DomPDF\Facade\Pdf;

class RoomTypeController extends Controller
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

        $roomTypes = RoomType::where('name', 'like', '%' .  $search . '%')
            ->orWhere('description', 'like', '%' .  $search . '%')
            ->paginate($paginationNum)
            ->withQueryString();

        $data = [
            'roomTypes' => $roomTypes,
            'search' => $search,
            'paginationNum' => $paginationNum
        ];

        return view('admin.roomTypes.index', $data);
    }

    public function create()
    {
        return view('admin.roomTypes.create');
    }

    public function store(StoreRoomTypeRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'description', $request->description);

            RoomType::create($data);
            return to_route('admin.roomTypes')->with('success', 'Room type created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(RoomType $roomType)
    {
        return view('admin.roomTypes.edit', [
            'roomType' => $roomType
        ]);
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'description', $request->description);

            $roomType->update($data);
            return to_route('admin.roomTypes')->with('success', 'Room type updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(RoomType $roomType)
    {
        //Xóa bản ghi được chọn
        $roomType->delete();
        //Quay về danh sách
        return to_route('admin.roomTypes')->with('success', 'Room type deleted successfully!');
    }

    // PDF
    public function downloadPDF()
    {
        $roomTypes = RoomType::all();

        $pdf = PDF::loadView('admin.roomTypes.pdf', array('roomTypes' =>  $roomTypes))
            ->setPaper('a4', 'portrait');

        return $pdf->download('data.pdf');
    }
}
