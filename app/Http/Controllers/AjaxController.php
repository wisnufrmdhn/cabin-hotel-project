<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AjaxService;
use App\Models\Customer;
use App\Models\HotelRoomReserved;
use App\Models\Reservation;

class AjaxController extends Controller
{
    private $service;

    public function __construct(AjaxService $service)
    {
        $this->service = $service;
    }

    public function getRoomNumbers($hotelRoomId)
    {
        try{    
            $roomDetails = $this->service->getRoomNumbers($hotelRoomId);
        }catch(\Throwable $th){
            return $th;
        }
        return response()->json($roomDetails);
    }

    public function getListCustomers(Request $request)
    {
        $term = $request->input('term'); // Ambil nilai 'term' dari permintaan Ajax
        // Buat query pencarian dengan Eloquent Query
        $results = Customer::where('customer_name', 'like', '%' . $term . '%')->take(10)->get();

        return response()->json($results);
    }

    public function getReservationData($reservationCode)
    {
        $reservation = Reservation::where('reservation_code', $reservationCode)->with('customer')->first();

        if($reservation){
            $hotelRoomReserved = HotelRoomReserved::where('reservation_id', $reservation->id)->with('hotelRoomNumber')->get();
            foreach ($hotelRoomReserved as $room) {
                // Update room_number in hotel_room_number object
                $room->hotelRoomNumber->room_number = sprintf('%04d', $room->hotelRoomNumber->room_number);
            }
            return response()->json([
                "reservation" => $reservation,
                "hotel_room" => $hotelRoomReserved
            ], 200);
        }else{
            return response()->json([
                "message" => "Reservation data not found"
            ], 400);
        }
    }

    public function updateReservationData($reservationCode, $status)
    {
        $reservation = Reservation::where('reservation_code', $reservationCode)->with('customer')->first();

        if($reservation){
            $reservationUpdate = $reservation->update([
                'status' => $status,
            ]);
    
            return response()->json([
                "message" => "Reservation data updated"
            ], 200);
        }else{
            return response()->json([
                "message" => "Reservation data not found"
            ], 400);
        }
    }
}
