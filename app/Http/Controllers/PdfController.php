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
use Carbon\Carbon;


class PdfController extends Controller
{
    public function generateInvoice($invoiceId)
    {
        $invoice = Reservation::where('reservation_code', $invoiceId)->with('payment', 'Customer')->first();

        $pdf = PDF::loadView('pdf.invoice', compact('invoice'));

        return $pdf->stream('invoice.pdf');
    }
}
