<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\PaymentMethod;
use App\Models\HotelRoomNumber;
use App\Models\CustomerTmp;
use App\Models\HotelRoomReservedTmp;
use App\Models\ReservationTmp;
use App\Models\PaymentAmenitiesTmp;
use App\Services\ReservationService;
use Carbon\Carbon;

class BookingListController extends Controller
{
    private $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        $reservationMethod = ReservationMethod::all();
        $hotelRoomDetails = HotelRoomNumber::where('hotel_branch_id', $pic->hotel_branch_id)->where('room_status_id', 3)->get();
        $roomId = [];
        
        foreach($hotelRoomDetails as $hotelRoomDetail){
            $roomId[] = $hotelRoomDetail->hotel_room_id;
        }

        $roomId = array_values(array_unique($roomId));
        $hotelRooms = HotelRoom::whereIn('id', $roomId)->get();
        
        $customerTmp = CustomerTmp::where('hotel_branch_id', $pic->hotel_branch_id)->first();
        $reservationTmp = [];
        $reservationDetailTmp = [];
        $hotelRoomReservedTmp = [];
        $amenitiesTmp = [];
        $totalPrice = null;
        $checkin = null;
        $checkout = null;
        $dayCategory = null;
        $diffResult = null;
        $paymentOTA = PaymentMethod::where('payment_method', 'like', "%OTA%")->get();
        $paymentCard = PaymentMethod::where('payment_method', 'like', "%Card%")->get();
        $paymentTransfer = PaymentMethod::where('payment_method', 'like', "%Transfer%")->get();
        $paymentQris = PaymentMethod::where('payment_method', 'like', "%Qris%")->get();
        
        if($customerTmp){
            $reservationTmp = ReservationTmp::where('hotel_branch_id', $pic->hotel_branch_id)->where('customer_tmp_id', $customerTmp->id)->first();
            if($reservationTmp){

                $dayCategory = $reservationTmp->reservation_day_category;
                $checkin = Carbon::parse($reservationTmp->reservation_start_date);
                $checkout = Carbon::parse($reservationTmp->reservation_end_date);
                $diff = $checkin->diffInHours($checkout);

                $day = intval($diff / 24);
                $hour = intval($diff % 24);
                $diffResult = $day . ' Hari : ' . $hour . ' Jam';
                
                $hotelRoomReservedTmp = HotelRoomReservedTmp::where('reservation_tmp_id', $reservationTmp->id)->with('reservationTmp', 'hotelRoomNumber.hotelRoom')->get();

                $totalPrice = HotelRoomReservedTmp::where('reservation_tmp_id', $reservationTmp->id)->with('reservationTmp', 'hotelRoomNumber.hotelRoom')->sum('price');

                $amenitiesTmp = PaymentAmenitiesTmp::where('hotel_branch_id', $pic->hotel_branch_id)->with('amenities')->get();

                if($amenitiesTmp){
                    $amenitiesTotalPrice = PaymentAmenitiesTmp::where('hotel_branch_id', $pic->hotel_branch_id)->with('amenities')->sum('total_price');
                    $totalPrice = $totalPrice + $amenitiesTotalPrice;
                }
            }
        }

        return view('admin.bookinglist.index', compact('reservationMethod', 'hotelRooms', 'customerTmp', 'reservationTmp', 'reservationDetailTmp', 'hotelRoomReservedTmp', 'paymentOTA', 'paymentCard', 'paymentTransfer', 'paymentQris', 'totalPrice', 'amenitiesTmp', 'checkin', 'checkout', 'diffResult', 'dayCategory')); 
    }
}
