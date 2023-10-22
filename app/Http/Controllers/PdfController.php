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
use Carbon\Carbon;


class PdfController extends Controller
{
    public function generateInvoice($invoiceId)
    {
        $invoice = Reservation::where('reservation_code', $invoiceId)->with('payment.DownPayment', 'customer')->first();
        $hotelRoomReserved = HotelRoomReserved::where('reservation_id', $invoice->id)->with('hotelRoomNumber.HotelRoom')->get();
        $subtotal = HotelRoomReserved::where('reservation_id', $invoice->id)->with('hotelRoomNumber.HotelRoom')->sum('price');
        $cashier = Auth::user()->name;
        $pdf = PDF::loadView('pdf.invoice', compact('invoice', 'hotelRoomReserved', 'subtotal', 'cashier'));

        return $pdf->stream('invoice.pdf');
    }
}
