<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookRoom(Request $request)
    {
        $validated = $request->validate([
            'checkin' => 'required|date|before:checkout|after:yesterday',
            'checkout' => 'required|date|after:checkin',
            'guest_num' => 'required|integer',
        ]);

        if ($validated) {
            $room = Room::find($request->room_id);
            $created_date = date('Y-m-d H:i:s');
            $guest_id = Auth::guard('guest')->id();
            $admin_id = Admin::first()->id;
//            format lai tu d-m-y thanh y-m-d
            $checkInDate = date('Y-m-d', strtotime($request->checkin));
            $checkOutDate = date('Y-m-d', strtotime($request->checkout));

            //days booked
            $dateIn = Carbon::createFromFormat('Y-m-d', $checkInDate);
            $dateOut = Carbon::createFromFormat('Y-m-d', $checkOutDate);
            $daysBooked = $dateIn->diffInDays($dateOut);

//            price
            $basePrice = $room->roomType->base_price;
            $totalPrice = $basePrice * $daysBooked;

            //check trung nhau
            $bookings = Booking::where('room_id', '=', $room->id)->get();
            foreach ($bookings as $booking) {
                $dateInCheck = Carbon::createFromFormat('Y-m-d', $booking->checkin_date);
                $dateOutCheck = Carbon::createFromFormat('Y-m-d', $booking->checkout_date);
                if ($dateIn->between($dateInCheck, $dateOutCheck) || $dateOut->between($dateInCheck, $dateOutCheck)) {
                    return back()->with('failed', 'Someone already booked this room for this period!');
                }
            }
       
            $data = [
                'created_date' => $created_date,
                'status' => 0,
                'guest_id' => $guest_id,
                'room_id' => $room->id,
                'admin_id' => $admin_id,
                'checkin_date' => $checkInDate,
                'checkout_date' => $checkOutDate,
                'guest_num' => $request->guest_num,
                'total_price' => $totalPrice,
            ];
            Booking::create($data);
            return back()->with('success', 'Booked successfully!');
        } else {
            return back()->with('failed', 'Something went wrong...');
        }
    }
}
