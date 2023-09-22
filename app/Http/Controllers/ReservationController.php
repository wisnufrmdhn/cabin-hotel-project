<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\HotelRoomRate;
use App\Models\PaymentMethod;
use App\Models\HotelRoomNumber;
use App\Services\ReservationService;
use App\Models\CustomerTmp;
use App\Models\HotelRoomReservedTmp;
use App\Models\ReservationTmp;
use App\Models\PaymentAmenitiesTmp;
use App\Models\ReservationDetailTmp;

class ReservationController extends Controller
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
        $hotelRoomDetails = HotelRoomNumber::where('hotel_branch_id', $pic->hotel_branch_id)->get();
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
        $paymentOTA = PaymentMethod::where('payment_method', 'like', "%OTA%")->get();
        $paymentCard = PaymentMethod::where('payment_method', 'like', "%Card%")->get();
        $paymentTransfer = PaymentMethod::where('payment_method', 'like', "%Transfer%")->get();
        $paymentQris = PaymentMethod::where('payment_method', 'like', "%Qris%")->get();
        
        if($customerTmp){
            $reservationTmp = ReservationTmp::where('hotel_branch_id', $pic->hotel_branch_id)->where('customer_tmp_id', $customerTmp->id)->first();
            if($reservationTmp){
                $reservationDetailTmp = ReservationDetailTmp::where('reservation_tmp_id', $reservationTmp->id)->with('reservationTmp')->get();

                $roomReservedId = [];

                foreach($reservationDetailTmp as $reservationDetailsTmp){
                    $roomReservedId[] = $reservationDetailsTmp->id;
                }
                
                $hotelRoomReservedTmp = HotelRoomReservedTmp::whereIn('reservation_detail_tmp_id', $roomReservedId)->with('reservationDetailTmp', 'hotelRoomNumber.hotelRoom')->get();

                $totalPrice = HotelRoomReservedTmp::whereIn('reservation_detail_tmp_id', $roomReservedId)->with('reservationDetailTmp', 'hotelRoomNumber.hotelRoom')->sum('price');

                $amenitiesTmp = PaymentAmenitiesTmp::where('hotel_branch_id', $pic->hotel_branch_id)->with('amenities')->get();

                if($amenitiesTmp){
                    $amenitiesTotalPrice = PaymentAmenitiesTmp::where('hotel_branch_id', $pic->hotel_branch_id)->with('amenities')->sum('total_price');
                    $totalPrice = $totalPrice + $amenitiesTotalPrice;
                }
            }
        }

        return view('admin.reservation.index', compact('reservationMethod', 'hotelRooms', 'customerTmp', 'reservationTmp', 'reservationDetailTmp', 'hotelRoomReservedTmp', 'paymentOTA', 'paymentCard', 'paymentTransfer', 'paymentQris', 'totalPrice', 'amenitiesTmp')); 
    }

    public function store(Request $request)
    {
        try{    
            $store = $this->service->store($request);
            return $store;
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Reservation data final failed to add');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Reservation data final added successfully');
    }

    public function storeCustomer(Request $request)
    {
        try{    
            $store = $this->service->storeCustomer($request);
        }catch(\Throwable $th){
            return redirect()->route('admin.reservation.index')->with('error', 'Customer failed to add');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Customer added successfully');
    }

    public function storeRoomOrder(Request $request)
    {
        try{    
            $store = $this->service->storeRoomOrder($request);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Room order failed to add');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Room order added successfully');
    }

    public function storeAmenities(Request $request)
    {
        try{    
            $store = $this->service->storeAmenities($request);
            return $store;
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Room order failed to add');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Room order added successfully');
    }
}
