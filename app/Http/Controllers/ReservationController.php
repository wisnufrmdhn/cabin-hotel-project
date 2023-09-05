<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\HotelRoomDetail;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        $reservationMethod = ReservationMethod::all();
        $hotelRoomDetails = HotelRoomDetail::where('hotel_branch_id', $pic->hotel_branch_id)->get();
        $roomId = [];
        
        foreach($hotelRoomDetails as $hotelRoomDetail){
            $roomId[] = $hotelRoomDetail->hotel_room_id;
        }

        $roomId = array_values(array_unique($roomId));
        $hotelRooms = HotelRoom::whereIn('id', $roomId)->get();

        return view('admin.reservation.index', compact('reservationMethod', 'hotelRooms')); 
    }

    public function store(Request $request)
    {
        
    }
}
