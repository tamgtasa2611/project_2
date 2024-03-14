<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $view = "grid";
        if ($request->view) {
            $view = $request->view;
        }

        $roomList = Room::get();
        $totalRoom = count($roomList);

        $rooms = Room::with('roomType')->with('images')->paginate(10)->withQueryString();

        $roomTypes = RoomType::all();

        $data = [
            'rooms' => $rooms,
            'totalRoom' => $totalRoom,
            'view' => $view,
            'roomTypes' => $roomTypes
        ];
        return view('guest.rooms.index', $data);
    }
}
