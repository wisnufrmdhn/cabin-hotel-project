<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CustomerTmp;
use App\Models\ReservationTmp;
use App\Models\ReservationDetailTmp;
use App\Models\HotelRoomNumber;
use App\Models\HotelRoomRate;
use App\Models\HotelRoomReservedTmp;
use App\Models\PaymentAmenitiesTmp;
use App\Models\Amenities;
use App\Models\PicHotelBranch;
use Carbon\Carbon;

class ReservationService
{
    public function store($request)
    {
        
    }

    public function storeCustomer($request)
    {
        // Upload customer photo and identity photo
        $customerPhoto = $this->uploadFile($request->file('customer_photo'), 'img/customer/identity_photos');
        $customerIdentityPhoto = $this->uploadFile($request->file('customer_identity_photo'), 'img/customer/identity_photos');
        $request['customer_identity_photo_url'] = $customerIdentityPhoto;
        $request['customer_photo_url'] = $customerPhoto;

        //define pic hotel branch 
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        $request['hotel_branch_id'] = $pic->hotel_branch_id;

        //filter request only for customer data
        $customer = $request->only([
            'hotel_branch_id',
            'reservation_method_id',
            'booking_number',
            'customer_identity_type', 
            'customer_name', 
            'customer_email', 
            'customer_phone', 
            'customer_address', 
            'customer_identity_photo_url', 
            'customer_photo_url',
        ]);

        //store customer tmp data to database
        $storeCustomer = CustomerTmp::create($customer);
        
        return $storeCustomer;
    }

    public function storeRoomOrder($request)
    {
        $user = Auth::user();
        $picHotelBranch = PicHotelBranch::where('user_id', $user->id)->first();
        $customerTmp = CustomerTmp::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->first();
        $reservationTmp = ReservationTmp::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('customer_tmp_id', $customerTmp->id)->first();

        if(!$reservationTmp){
            //get admin data for know who input this data and from where hotel branches
            $request->merge([
                'user_id' => $user->id,
                'hotel_branch_id' => $picHotelBranch->hotel_branch_id,
                'customer_tmp_id' => $customerTmp->id
            ]);

            //check reservation status type if method id 1 then the value is checkin, for another id the value is booking
            $request['status'] = $customerTmp->reservation_method_id == 1 ? 'Checkin' : 'Booking';
                //filter request only for reservation data
                $reservation = $request->only([
                    'hotel_branch_id', 
                    'user_id', 
                    'customer_tmp_id', 
                    'status', 
                ]);
                $storeReservation = ReservationTmp::create($reservation);
        }

        // //check reservation status type if method id 1 then the value is reservation_start_date_daily add 1 hour
        // $request['reservation_start_date_daily'] = $request['reservation_method_id'] == 1 ? Carbon::parse($request['reservation_end_date_daily'])->addHours(1) : $request['reservation_start_date_daily'];

        //check reservation checkout type if type is daily, mixed, and hourly condition
        if($request['daily']){
            $request['reservation_start_date'] = $request['reservation_start_date_daily'];
            $request['reservation_end_date'] = $request['reservation_end_date_daily'];
        }else if($request['mixed']){
            $request['reservation_start_date'] = $request['reservation_start_date_daily'];
            //convert day and hour to datetime with carbon
            $request['reservation_end_date'] = Carbon::parse($request['reservation_start_date_daily'])->addDays($request['mixed_day'])->addHours($request['mixed_hour']);
        }

        $reservationTemporary = ReservationTmp::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('customer_tmp_id', $customerTmp->id)->first();
        $request['reservation_tmp_id'] = $reservationTemporary->id;

        //filter request only for reservation data
        $reservationDetail = $request->only([
            'reservation_tmp_id', 
            'reservation_start_date', 
            'reservation_end_date', 
            'reservation_day_category',
        ]);

        $storeReservationDetail = ReservationDetailTmp::create($reservationDetail);

        $request['reservation_detail_tmp_id'] = $storeReservationDetail->id;
        $hotelRoomNumber = HotelRoomNumber::where('id', $request['hotel_room_number_id'])->first();
        $hotelRoomId = $hotelRoomNumber->hotel_room_id;

        $checkin = Carbon::parse($request['reservation_start_date']);
        $checkout = Carbon::parse($request['reservation_end_date']);
        $diff = $checkin->diffInHours($checkout);

        if($diff <= 8){ //harga kamar dibawah 8 jam dibulatkan ke 8 jam
            $priceHour = HotelRoomRate::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->where('room_duration', 8)->first();

            $request['price'] = $priceHour->room_rates;
        }else if($diff > 24){ //logic perhitungan khusus untuk harga kamar diatas 24 jam
            $resultDay = intval($diff / 24);
            $remainsHour = $diff % 24;
            if($remainsHour !== 0){
                $remainsHour = $remainsHour < 8 ? 8 : $remainsHour;
                $priceDay = HotelRoomRate::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->where('room_duration', 24)->first();
                $priceHour = HotelRoomRate::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->where('room_duration', $remainsHour)->first();

                $request['price'] = ($priceDay->room_rates * $resultDay) + $priceHour->room_rates;
            }else{
                $priceDay = HotelRoomRate::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->where('room_duration', 24)->first();

                $request['price'] = $priceDay->room_rates * $resultDay;
            }
        }else{
            $priceHour = HotelRoomRate::where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_branch_id', $picHotelBranch->hotel_branch_id)->where('hotel_room_id', $hotelRoomId)->where('room_duration', 8)->first();

            $request['price'] = $priceHour->room_rates;
        }

        
        $storeHotelRoomReserved = HotelRoomReservedTmp::create([
            'reservation_detail_tmp_id' => $request['reservation_detail_tmp_id'],
            'hotel_room_number_id'      => $request['hotel_room_number_id'],
            'total_guest'               => $request['total_guest'],
            'price'                     => $request['price'],
        ]);

        return $storeHotelRoomReserved;
    }

    public function storeAmenities($request)
    {
        $user = Auth::user();
        $picHotelBranch = PicHotelBranch::where('user_id', $user->id)->first();
        $breakfast = Amenities::where('amenities', 'Breakfast')->first();
        $extraBed = Amenities::where('amenities', 'Extra Bed')->first();

        if($request['amount_breakfast']){
            $paymentAmenitiesTmp = PaymentAmenitiesTmp::create([
                'hotel_branch_id' => $picHotelBranch->hotel_branch_id,
                'amenities_id' => $breakfast->id,
                'amount' => $request['amount_breakfast'],
                'price'  => $breakfast->price,
                'total_price' => $breakfast->price * $request['amount_breakfast']
            ]);
        }
        
        if($request['amount_extra_bed']){
            $paymentAmenitiesTmp = PaymentAmenitiesTmp::create([
                'hotel_branch_id' => $picHotelBranch->hotel_branch_id,
                'amenities_id' => $extraBed->id,
                'amount' => $request['amount_extra_bed'],
                'price'  => $extraBed->price,
                'total_price' => $extraBed->price * $request['amount_extra_bed']
            ]);
        }

        return $paymentAmenitiesTmp;
    }

    private function uploadFile($file, $destinationPath)
    {
        $fileName = $file->getClientOriginalName();
        $file->move(public_path($destinationPath), $fileName);
        return "$destinationPath/$fileName";
    }
}

?>