<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\HotelRoomDetail;
use App\Services\ReservationService;

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
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function storeAmenities(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
