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
use App\Models\Payment;
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

        $subtotalAmenities = 0;

        if(count($paymentAmenities) > 0){
            $subtotalAmenities = PaymentAmenities::where('payment_id', $invoice->payment->id)->with('amenities')->sum('total_price') ?? 0;
        }

        if($invoice->payment->discount < 100){
            $discount = ($subtotal + $subtotalAmenities) * ($invoice->payment->discount / 100);
        }  

        $pdf = PDF::loadView('pdf.invoice', compact('invoice', 'hotelRoomReserved', 'subtotal', 'cashier', 'discount', 'paymentAmenities', 'subtotalAmenities', 'i'));

        return $pdf->stream('invoice.pdf');
    }

    public function generateDetailPaymentInvoice($invoiceId)
    {
        $i = 1;
        $invoice = Reservation::where('reservation_code', $invoiceId)->with('payment.DownPayment', 'customer', 'payment.PaymentDetail.PaymentMethod')->first();
        $hotelRoomReserved = HotelRoomReserved::where('reservation_id', $invoice->id)->with('hotelRoomNumber.HotelRoom')->get();
        $paymentAmenities = PaymentAmenities::where('payment_id', $invoice->payment->id)->where('total_price', '!=', 0)->with('amenities')->get();
        $subtotal = HotelRoomReserved::where('reservation_id', $invoice->id)->with('hotelRoomNumber.HotelRoom')->sum('price');
        $cashier = Auth::user()->name;

        $discount = $invoice->payment->discount ?? 0; 

        $subtotalAmenities = 0;

        if(count($paymentAmenities) > 0){
            $subtotalAmenities = PaymentAmenities::where('payment_id', $invoice->payment->id)->with('amenities')->sum('total_price') ?? 0;
        }

        if($invoice->payment->discount < 100){
            $discount = ($subtotal + $subtotalAmenities) * ($invoice->payment->discount / 100);
        }  

        $pdf = PDF::loadView('pdf.invoice-detail-payment', compact('invoice', 'hotelRoomReserved', 'subtotal', 'cashier', 'discount', 'paymentAmenities', 'subtotalAmenities', 'i'));

        return $pdf->stream('invoice-detail-payment.pdf');
    }

    public function generateReportFinanceFO($from, $to)
    {
        $i = 1;
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        $branch = HotelBranch::where('id', $pic->hotel_branch_id)->first();
        $branchName = $branch->hotel_name;
        $branchCode = $branch->hotel_code;

        $payment = Payment::where('payment_code', 'like', '%' . $branchCode . '%')->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->with('downPayment')->get();
        $totalPayment = number_format(Payment::where('payment_code', 'like', '%' . $branchCode . '%')->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->with('downPayment')->sum('total_payment'), 0, ',', '.');

        $pdf = PDF::loadView('pdf.finance-fo', compact('i', 'branchName', 'from', 'to', 'payment', 'totalPayment'));

        return $pdf->stream('report-finance-fo.pdf');
    }

    public function generateReportFinanceHO($from, $to, $branch)
    {
        $i = 1;
        $user = Auth::user();
        
        if($branch == 'All'){
            $branchName = 'Semua Cabang';
            $payment = Payment::whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->with('downPayment')->get();
            $totalPayment = number_format(Payment::whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->with('downPayment')->sum('total_payment'), 0, ',', '.');
        }else{
            $hotelBranch = HotelBranch::where('id', $branch)->first();
            $branchName = $hotelBranch->hotel_name;
            $branchCode = $hotelBranch->hotel_code;
            $payment = Payment::where('payment_code', 'like', '%' . $branchCode . '%')->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->with('downPayment')->get();
            $totalPayment = number_format(Payment::where('payment_code', 'like', '%' . $branchCode . '%')->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->with('downPayment')->sum('total_payment'), 0, ',', '.');
        }

        $pdf = PDF::loadView('pdf.finance-ho', compact('i', 'branchName', 'from', 'to', 'payment', 'totalPayment'));

        return $pdf->stream('report-finance-ho.pdf');
    }
}
