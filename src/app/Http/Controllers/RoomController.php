<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

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

        //calendar
        $events = [];
        $bookings = Booking::where('room_id', '=', $room->id)->get();
        foreach ($bookings as $booking) {
            $checkInDate = $booking->checkin_date;
            $checkOutDate = $booking->checkout_date;
            //days booked
            $dateIn = Carbon::createFromFormat('Y-m-d', $checkInDate);
            $dateOut = Carbon::createFromFormat('Y-m-d', $checkOutDate)->addDay();

            if ($booking->guest_id == Auth::guard('guest')->id()) {
                $events[] = [
                    'id' => $booking->id,
                    'title' => 'Your Booking',
                    'allDay' => true,
                    'start' => $dateIn,
                    'end' => $dateOut,
                ];
            } else {
                $events[] = [
                    'id' => $booking->id,
                    'title' => 'Booked',
                    'allDay' => true,
                    'start' => $dateIn,
                    'end' => $dateOut,
                    'color' => 'red',
                ];
            }
        }

        $similarRooms = Room::where('room_type_id', '=', $room->roomType->id)
            ->where('id', '!=', $room->id)
            ->with('images')
            ->limit(6)
            ->get();

        return view('guest.rooms.show', [
            'room' => $room,
            'roomImages' => $roomImages,
            'events' => $events,
            'similarRooms' => $similarRooms,
        ]);
    }

    public function postBookingInfo(Room $room, Request $request)
    {
        $created_date = date('Y-m-d H:i:s');
        $guest_id = Auth::guard('guest')->id();
        $checkInDate = $request->checkin;
        $checkOutDate = $request->checkout;

        //days booked
//        $dateIn = Carbon::createFromFormat('Y-m-d', $checkInDate);
//        $dateOut = Carbon::createFromFormat('Y-m-d', $checkOutDate);
//        $daysBooked = $dateIn->diffInDays($dateOut);

        $basePrice = $room->roomType->base_price;
        $totalPrice = $basePrice * $daysBooked;

        dd($checkInDate, $checkOutDate, $daysBooked, $basePrice, $totalPrice);

        $validated = $request->validate([
            'checkin' => 'required|date|before:checkout|after:yesterday',
            'checkout' => 'required|date|after:checkin',
            'guest_num' => 'required',
        ]);

        if ($validated) {
            session()->put('booking', [
                'created_date' => $created_date,
                'status' => 0,
                'guest_id' => $guest_id,
                'room_id' => $room->id,
                'admin_id' => '',
                'checkin_date' => $checkInDate,
                'checkout_date' => $checkOutDate,
                'guest_num' => $request->guest_num,
                'total_price' => $totalPrice,
            ]);
            return to_route('guest.bookRoom');
        } else {
            return back()->with('failed', 'Something went wrong...');
        }
    }
}
