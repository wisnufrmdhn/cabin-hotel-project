<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AjaxService;
use App\Models\Customer;

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
}
