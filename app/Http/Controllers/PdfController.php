<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
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
use App\Models\HotelRoomReserved;
use App\Models\PaymentAmenities;
use Carbon\Carbon;


class PdfController extends Controller
{
    public function generateInvoice($invoiceId)
    {
        $i = 1;
        $invoice = Reservation::where('reservation_code', $invoiceId)->with('payment.DownPayment', 'customer')->first();
        $hotelRoomReserved = HotelRoomReserved::where('reservation_id', $invoice->id)->with('hotelRoomNumber.HotelRoom')->get();
        $paymentAmenities = PaymentAmenities::where('payment_id', $invoice->payment->id)->where('total_price', '!=', 0)->with('amenities')->get();
        $subtotal = HotelRoomReserved::where('reservation_id', $invoice->id)->with('hotelRoomNumber.HotelRoom')->sum('price');
        $cashier = Auth::user()->name;

        $discount = $invoice->payment->discount ?? 0;

        if($invoice->payment->discount < 100){
            $discount = $subtotal * ($invoice->payment->discount / 100);
        }   

        $subtotalAmenities = 0;

        if(count($paymentAmenities) > 0){
            $subtotalAmenities = PaymentAmenities::where('payment_id', $invoice->payment->id)->with('amenities')->sum('total_price') ?? 0;
        }

        $pdf = PDF::loadView('pdf.invoice', compact('invoice', 'hotelRoomReserved', 'subtotal', 'cashier', 'discount', 'paymentAmenities', 'subtotalAmenities', 'i'));

        return $pdf->stream('invoice.pdf');
    }
}
