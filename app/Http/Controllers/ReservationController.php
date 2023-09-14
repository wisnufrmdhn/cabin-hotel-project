<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\HotelRoomRate;
use App\Models\HotelRoomNumber;
use App\Services\ReservationService;
use App\Models\CustomerTmp;
use App\Models\HotelRoomReservedTmp;
use App\Models\ReservationTmp;
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
        
        if($customerTmp){
            $reservationTmp = ReservationTmp::where('hotel_branch_id', $pic->hotel_branch_id)->where('customer_tmp_id', $customerTmp->id)->first();

            $reservationDetailTmp = ReservationDetailTmp::where('reservation_tmp_id', $reservationTmp->id)->with('reservationTmp')->get();

            $roomReservedId = [];

            foreach($reservationDetailTmp as $reservationDetailsTmp){
                $roomReservedId[] = $reservationDetailsTmp->id;
            }
            
            $hotelRoomReservedTmp = HotelRoomReservedTmp::whereIn('reservation_detail_tmp_id', $roomReservedId)->with('reservationDetailTmp', 'hotelRoomNumber.hotelRoom')->get();
            return view('admin.reservation.index', compact('reservationMethod', 'hotelRooms', 'customerTmp', 'reservationTmp', 'reservationDetailTmp', 'hotelRoomReservedTmp')); 
        }

        return view('admin.reservation.index', compact('reservationMethod', 'hotelRooms', 'customerTmp', 'reservationTmp', 'reservationDetailTmp', 'hotelRoomReservedTmp')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function storeCustomer(Request $request)
    {
        try{    
            $store = $this->service->storeCustomer($request);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Customer failed to add');
        }
        return $store;
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
        return $store;
        return redirect()->route('admin.reservation.index')->with('success', 'Room order added successfully');
    }

    public function storeAmenities(Request $request)
    {
        try{    
            $store = $this->service->storeAmenities($request);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Room order failed to add');
        }
        return $store;
        return redirect()->route('admin.reservation.index')->with('success', 'Room order added successfully');
    }
}
