<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Customer;
use App\Models\CustomerTmp;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use App\Models\ReservationTmp;
use App\Models\ReservationDetailTmp;
use App\Models\HotelRoomNumber;
use App\Models\HotelBranch;
use App\Models\HotelRoomRate;
use App\Models\HotelRoomReservedTmp;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\PaymentAmenities;
use App\Models\PaymentAmenitiesTmp;
use App\Models\Amenities;
use App\Models\HotelRoomReserved;
use App\Models\PicHotelBranch;
use App\Models\DownPayment;
use Carbon\Carbon;

class BookingListService
{
    public function storeNewPayment($request)
    {
        $payment = Payment::where('id', $request['payment_id'])->first();
        $reservation = Reservation::where('payment_id', $request['payment_id'])->first();
        $reservationCode = $reservation->reservation_code;
        $currentPayment = $payment['total_payment'];

        $request['payment_ota_value'] = $request['payment_ota_value'] ? (int) preg_replace("/[^0-9]/", "", $request['payment_ota_value']) : 0;
        $request['payment_cash_value'] = $request['payment_cash_value'] ? (int) preg_replace("/[^0-9]/", "", $request['payment_cash_value']) : 0;
        $request['payment_card_value'] = $request['payment_card_value'] ? (int) preg_replace("/[^0-9]/", "", $request['payment_card_value']) : 0;
        $request['payment_qris_value'] = $request['payment_qris_value'] ? (int) preg_replace("/[^0-9]/", "", $request['payment_qris_value']) : 0;
        $request['payment_transfer_value'] = $request['payment_transfer_value'] ? (int) preg_replace("/[^0-9]/", "", $request['payment_transfer_value']) : 0;
        $request['payment_va_value'] = $request['payment_va_value'] ? (int) preg_replace("/[^0-9]/", "", $request['payment_va_value']) : 0;

        if($request['payment_method_ota']){
            $request['total_payment'] = $request['payment_ota_value'];
            $storePaymentDetailOta = PaymentDetail::create([
                'payment_id'            => $request['payment_id'],
                'payment_method_id'     => $request['payment_category_ota'],
                'payment_detail_value'  => $request['payment_ota_value'],
                'change'                => null,
                'bank_name'             => null,
                'card_number'           => null,
                'reference_number'      => null,
            ]);
        }else{
            $request['total_payment'] = $request['payment_cash_value'] +  $request['payment_card_value'] + $request['payment_qris_value'] + $request['payment_transfer_value'] + $request['payment_va_value'];
        }

        if($request['payment_method_cash']){
            $storePaymentDetailCash = PaymentDetail::create([
                'payment_id'            => $request['payment_id'],
                'payment_method_id'     => 1,
                'payment_detail_value'  => $request['payment_cash_value'],
                'change'                => $request['change'] ? (int) preg_replace("/[^0-9]/", "", $request['change']) : 0,
                'bank_name'             => null,
                'card_number'           => null,
                'reference_number'      => null,
            ]);
        }

        if($request['payment_method_non_cash']){
            if($request['payment_category_card']){
                $storePaymentDetailCard = PaymentDetail::create([
                    'payment_id'            => $request['payment_id'],
                    'payment_method_id'     => $request['payment_category_card'],
                    'payment_detail_value'  => $request['payment_card_value'],
                    'change'                => null,
                    'bank_name'             => null,
                    'card_number'           => $request['payment_method_card_number'],
                    'reference_number'      => null,
                ]);
            }

            if($request['payment_category_qris']){
                $storePaymentDetailQris = PaymentDetail::create([
                    'payment_id'            => $request['payment_id'],
                    'payment_method_id'     => $request['payment_category_qris'],
                    'payment_detail_value'  => $request['payment_qris_value'],
                    'change'                => null,
                    'bank_name'             => null,
                    'card_number'           => null,
                    'reference_number'      => $request['payment_method_qris_reference'],
                ]);
            }

            if($request['payment_category_transfer']){
                $storePaymentDetailTransfer = PaymentDetail::create([
                    'payment_id'            => $request['payment_id'],
                    'payment_method_id'     => $request['payment_category_transfer'],
                    'payment_detail_value'  => $request['payment_transfer_value'],
                    'change'                => null,
                    'bank_name'             => null,
                    'card_number'           => null,
                    'reference_number'      => $request['payment_method_transfer_reference'],
                ]);
            }

            if($request['payment_category_va']){
                $storePaymentDetailTransfer = PaymentDetail::create([
                    'payment_id'            => $request['payment_id'],
                    'payment_method_id'     => $request['payment_category_va'],
                    'payment_detail_value'  => $request['payment_va_value'],
                    'change'                => null,
                    'bank_name'             => null,
                    'card_number'           => null,
                    'reference_number'      => $request['payment_method_va_reference'],
                ]);
            }
        }

        $totalPayment = $currentPayment + $request['total_payment'];

            if($payment->payment_status == 'DP'){
                if($payment->total_price > $totalPayment){
                    $updatePayment = $payment->update([
                        'total_payment' => $totalPayment,
                        'payment_status' => 'DP 2'
                    ]);
                }else{
                    $updatePayment = $payment->update([
                        'total_payment' => $totalPayment,
                        'payment_status' => 'Lunas + DP 1'
                    ]);
                }
            }else{
                if($payment->total_price == $totalPayment){
                    $updatePayment = $payment->update([
                        'total_payment' => $totalPayment,
                        'payment_status' => 'Lunas + DP 2'
                    ]);
                }
            }

            return $reservationCode;
    }
}

?>