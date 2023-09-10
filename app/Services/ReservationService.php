<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CustomerTmp;
use App\Models\ReservationTmp;
use Carbon\Carbon;

class ReservationService
{
    public function storeCustomer($request)
    {
        // Upload customer photo and identity photo
        $customerPhoto = $this->uploadFile($request->file('customer_photo'), 'img/customer/identity_photos');
        $customerIdentityPhoto = $this->uploadFile($request->file('customer_identity_photo'), 'img/customer/identity_photos');
        $request['customer_identity_photo_url'] = $customerIdentityPhoto;
        $request['customer_photo_url'] = $customerPhoto;

        //filter request only for customer data
        $customer = $request->only([
            'customer_identity_type', 
            'customer_name', 
            'customer_email', 
            'customer_phone', 
            'customer_address', 
            'customer_identity_photo_url', 
            'customer_photo_url'
        ]);

        //store customer tmp data to database
        $storeCustomer = CustomerTmp::create($customer);
        
        //get admin data for know who input this data and from where hotel branches
        $user = Auth::user();
        $request->merge([
            'user_id' => $user->id,
            'hotel_branch_id' => 1,
            'customer_id' => $storeCustomer->id
        ]);

        //check reservation status type if method id 1 then the value is checkin, for another id the value is booking
        $request['status'] = $request['reservation_method_id'] == 1 ? 'Checkin' : 'Booking';

        //check reservation status type if method id 1 then the value is reservation_start_date_daily add 1 hour
        $request['reservation_start_date_daily'] = $request['reservation_method_id'] == 1 ? Carbon::parse($request['reservation_end_date_daily'])->addHours(1) : $request['reservation_start_date_daily'];

        //check reservation checkout type if type is daily, mixed, and hourly condition
        if($request['daily']){
            $request['reservation_start_date'] = $request['reservation_start_date_daily'];
            $request['reservation_end_date'] = $request['reservation_end_date_daily'];
        }else if($request['mixed']){
            $request['reservation_start_date'] = $request['reservation_start_date_daily'];
            //convert day and hour to datetime with carbon
            $request['reservation_end_date'] = Carbon::parse($request['reservation_end_date_daily'])->addDays($request['mixed_day'])->addHours($request['mixed_hour']);
        }

        //filter request only for reservation data
        $reservation = $request->only([
            'hotel_branch_id', 
            'user_id', 
            'customer_id', 
            'reservation_start_date', 
            'reservation_end_date', 
            'reservation_method_id',
            'reservation_day_category',
            'status', 
            'booking_number'
        ]);

        $storeReservation = ReservationTmp::create($reservation);

        return $storeReservation;
    }

    private function uploadFile($file, $destinationPath)
    {
        $fileName = $file->getClientOriginalName();
        $file->move(public_path($destinationPath), $fileName);
        return "$destinationPath/$fileName";
    }
}

?>