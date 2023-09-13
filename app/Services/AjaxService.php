<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ReservationTmp;
use App\Models\HotelRoomNumber;
use App\Models\PicHotelBranch;
use Carbon\Carbon;

class AjaxService
{
    public function getRoomNumbers($hotelRoomId)
    {
        $user = Auth::user();
        $picHotelBranch = PicHotelBranch::where('user_id', $user->id)->first();
        $reservationTmp = ReservationTmp::where('user_id', $user->id)->first();

        // $checkin = Carbon::parse($reservationTmp->reservation_start_date);
        // $checkout = Carbon::parse($reservationTmp->reservation_end_date);
        // $diff = $checkin->diffInHours($checkout);to
        
        $roomNumbers = HotelRoomNumber::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->get();

        return $roomNumbers;
    }
}

?>