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
            'guest_num' => $request->guest_num ?? 1,
        ];
        $price = [
            'from_price' => $request->from_price ?? 0,
            'to_price' => $request->to_price ?? 1000,
        ];
        $rating = $request->rating ?? 0;

        $view = $request->view ?? "grid";

        $sort = $request->sort ?? 0;

//        get rooms
        $roomList = Room::getRooms($search, $price, $sort);
        //        get total rooms available based on search/filter
        $countRoom = count($roomList->get());
        $roomsPaginated = $roomList->paginate(10)->withQueryString();


//        get room types for filter
        $roomTypes = RoomType::getRoomTypes();

        $data = [
            'search' => $search,
            'rooms' => $roomsPaginated,
            'countRoom' => $countRoom,
            'price' => $price,
            'rating' => $rating,
            'view' => $view,
            'sort' => $sort,
            'roomTypes' => $roomTypes
        ];
        return view('guest.rooms.index', $data);
    }

    public function show(Room $room)
    {
        $roomImages = RoomImage::where('room_id', '=', $room->id)->get();
        return view('guest.rooms.show', [
            'room' => $room,
            'roomImages' => $roomImages
        ]);
    }
}
