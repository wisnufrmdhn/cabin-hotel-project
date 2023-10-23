<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ReservationTmp;
use App\Models\HotelRoom;
use App\Models\HotelRoomNumber;
use App\Models\HotelRoomReservedTmp;
use App\Models\PicHotelBranch;
use Carbon\Carbon;

class AjaxService
{
    public function getRoomNumbers($hotelRoomId)
    {
        $user = Auth::user();
        $picHotelBranch = PicHotelBranch::where('user_id', $user->id)->first();
        $reservationTmp = ReservationTmp::where('user_id', $user->id)->first();
        $roomReservedId = [];

        if($reservationTmp){
            $hotelRoomReservedTmp = HotelRoomReservedTmp::where('reservation_tmp_id', $reservationTmp->id)->get();

            foreach($hotelRoomReservedTmp as $roomReserved){
                $roomReservedId[] = $roomReserved->hotel_room_number_id;
            }
        }

        // $checkin = Carbon::parse($reservationTmp->reservation_start_date);
        // $checkout = Carbon::parse($reservationTmp->reservation_end_date);
        // $diff = $checkin->diffInHours($checkout);to
        
        $roomNumbers = HotelRoomNumber::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->whereNotIn('id', $roomReservedId)->where('room_status_id', 3)->get();

        return $roomNumbers;
    }
}

?>