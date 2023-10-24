<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\PaymentMethod;
use App\Models\HotelRoomNumber;
use App\Services\ReservationService;
use App\Models\CustomerTmp;
use App\Models\HotelRoomReservedTmp;
use App\Models\ReservationTmp;
use App\Models\PaymentAmenitiesTmp;
use App\Models\Reservation;
use App\Models\HotelBranch;
use Carbon\Carbon;

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

        return view('admin.reservation.index', compact('reservationMethod', 'hotelRooms', 'customerTmp', 'reservationTmp', 'reservationDetailTmp', 'hotelRoomReservedTmp', 'paymentOTA', 'paymentCard', 'paymentTransfer', 'paymentQris', 'totalPrice', 'amenitiesTmp', 'checkin', 'checkout', 'diffResult', 'dayCategory')); 
    }

    public function store(Request $request)
    {
        try{    
            $store = $this->service->store($request);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Reservation data final failed to add');
        }
        return redirect()->route('pdf.invoices', ['invoiceId' => $store]);
    }

    public function storeCustomer(Request $request)
    {
        if($request['customer_check'] == 'on'){
            $request->validate([
                'customer_id' => 'required',
            ]);
        }else{
            $request->validate([
                'customer_name' => 'required',
                'customer_title' => 'required',
                'customer_identity_type' => 'required',
                'customer_identity_photo' => 'required',
                'customer_email' => 'required',
                'customer_address' => 'required',
                'customer_phone' => 'required',
            ]);
        }

        try{    
            $store = $this->service->storeCustomer($request);
        }catch(\Throwable $th){
            return $th;
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
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Room order failed to add');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Room order added successfully');
    }

    public function deleteCustomer($id)
    {
        try{    
            $delete = $this->service->deleteCustomer($id);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Customer failed to remove');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Customer remove successfully');
    }

    public function deleteRooms($id)
    {
        try{    
            $delete = $this->service->deleteRooms($id);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Room failed to remove');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Room remove successfully');
    }

    public function deleteAdditional($id)
    {
        try{    
            $delete = $this->service->deleteAdditional($id);
        }catch(\Throwable $th){
            return $th;
            return redirect()->route('admin.reservation.index')->with('error', 'Additional failed to remove');
        }
        return redirect()->route('admin.reservation.index')->with('success', 'Additional remove successfully');
    }
}
