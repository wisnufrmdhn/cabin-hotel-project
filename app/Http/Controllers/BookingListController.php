<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReservationMethod;
use App\Models\PicHotelBranch;
use App\Models\HotelRoom;
use App\Models\PaymentMethod;
use App\Models\HotelRoomNumber;
use App\Models\CustomerTmp;
use App\Models\HotelRoomReservedTmp;
use App\Models\Reservation;
use App\Models\ReservationTmp;
use App\Models\PaymentAmenitiesTmp;
use App\Services\ReservationService;
use Carbon\Carbon;

class BookingListController extends Controller
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

        $dateNow = Carbon::now('Asia/Bangkok')->isoFormat('DD MMMM YYYY');
        $dateQuery = Carbon::now('Asia/Bangkok')->toDateString();
        $reservation = Reservation::query();
        $countReservationToday = Reservation::where('reservation_start_date', $dateQuery)->count();
        $countCheckInToday = Reservation::where('reservation_start_date', $dateQuery)->where('status', 'Checkin')->count();
        $countCheckOutToday = Reservation::where('reservation_start_date', $dateQuery)->where('status', 'Checkout')->count();

        $reservationData = $reservation->where('hotel_branch_id', $pic->hotel_branch_id)->orderBy('reservation_start_date', 'desc')->with('payment.paymentDetail', 'customer', 'reservationMethod')->paginate(10);

        $paymentMethod = PaymentMethod::all();
        $paymentOTA = PaymentMethod::where('payment_method', 'like', "%OTA%")->get();
        $paymentCard = PaymentMethod::where('payment_method', 'like', "%Card%")->get();
        $paymentTransfer = PaymentMethod::where('payment_method', 'like', "%Transfer%")->get();
        $paymentQris = PaymentMethod::where('payment_method', 'like', "%Qris%")->get();
        $paymentVA = PaymentMethod::where('payment_method', 'like', "%VA%")->get();

        return view('admin.bookinglist.index', compact('reservationData', 'paymentMethod', 'paymentOTA', 'paymentCard', 'paymentTransfer', 'paymentQris', 'paymentVA', 'countReservationToday', 'countCheckInToday', 'countCheckOutToday', 'dateNow')); 
    }

    public function show($reservationCode)
    {
        $paymentMethod = PaymentMethod::all();
        $paymentOTA = PaymentMethod::where('payment_method', 'like', "%OTA%")->get();
        $paymentCard = PaymentMethod::where('payment_method', 'like', "%Card%")->get();
        $paymentTransfer = PaymentMethod::where('payment_method', 'like', "%Transfer%")->get();
        $paymentQris = PaymentMethod::where('payment_method', 'like', "%Qris%")->get();
        $paymentVA = PaymentMethod::where('payment_method', 'like', "%VA%")->get();

        $reservationDetail = Reservation::where('reservation_code', $reservationCode)->with('payment.paymentDetail.paymentMethod', 'customer', 'reservationMethod', 'hotelRoomReserved.hotelRoomNumber.hotelRoom')->first();

        return view('admin.bookinglist.detail', compact('reservationDetail', 'paymentOTA', 'paymentCard', 'paymentTransfer', 'paymentQris', 'paymentVA')); 
    }
}
