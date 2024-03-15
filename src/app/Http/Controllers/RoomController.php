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
        $search = [
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
            'guest_num' => $request->guest_num,
        ];

        $view = "grid";
        if ($request->view) {
            $view = $request->view;
        }
        $sort = 0;
        if ($request->sort) {
            $sort = $request->sort;
        }

//        get rooms
        $roomList = Room::getRooms($search, $sort);
        //        get total rooms available based on search/filter
        $countRoom = count($roomList->get());
        $roomsPaginated = $roomList->paginate(10)->withQueryString();


//        get room types for filter
        $roomTypes = RoomType::getRoomTypes();

        $data = [
            'search' => $search,
            'rooms' => $roomsPaginated,
            'countRoom' => $countRoom,
            'view' => $view,
            'sort' => $sort,
            'roomTypes' => $roomTypes
        ];
        return view('guest.rooms.index', $data);
    }

    public function search()
    {

    }
}
