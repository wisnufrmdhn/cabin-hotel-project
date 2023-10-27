<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
use App\Models\DownPayment;
use App\Models\Payment;
use App\Models\HotelRoomReserved;
use App\Models\PaymentDetail;
use App\Models\HotelBranch;
use Carbon\Carbon;

class FinanceController extends Controller
{
    private $service;

    public function __construct(ReservationService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        $branchId = $pic->hotel_branch_id;
        $paymentMethod = PaymentMethod::all();
        $query = Reservation::query();

        $getReservation = $query->where('hotel_branch_id', $pic->hotel_branch_id)->get();
        $reservationId = [];
        $paymentId = [];

        foreach ($getReservation as $reservationData) {
            $reservationId[] = $reservationData->id;
            $paymentId[] = $reservationData->payment_id;
        }   

        $totalIncomeRoom = HotelRoomReserved::whereIn('reservation_id', $reservationId)->sum('price');
        $totalIncomeRoom = number_format($totalIncomeRoom, 0, ',', '.');
        $totalDownPayment = DownPayment::whereIn('payment_id', $paymentId)->sum('down_payment');
        $totalDownPayment = number_format($totalDownPayment, 0, ',', '.');

        // Apply filters based on dropdown selections
        if ($request->filled('payment_check')) {
            $payment = Payment::where('payment_check', $request['payment_check'])->
            whereHas('reservation', function ($query) use ($branchId) {
                    $query->where('hotel_branch_id', $branchId);
            })->get();

            $idPayment = [];

            foreach ($payment as $item) {
                $idPayment[] = $item->id;
            }

            $reservation = $query->where('hotel_branch_id', $pic->hotel_branch_id)->whereIn('payment_id', $idPayment)->with('payment.paymentDetail.paymentMethod', 'customer', 'payment.downPayment', 'hotelRoomReserved', 'reservationMethod',)->paginate(10);
        }else if($request->filled('payment_method_id')){
            $paymentMethodId = $request['payment_method_id'];

            $payment = Payment::whereHas('paymentDetail', function ($query) use ($paymentMethodId) {
                $query->where('payment_method_id', $paymentMethodId);
            })->get();

            $idPayment = [];

            foreach ($payment as $item) {
                $idPayment[] = $item->id;
            }

            $reservation = $query->where('hotel_branch_id', $pic->hotel_branch_id)->whereIn('payment_id', $idPayment)->with('payment.paymentDetail.paymentMethod', 'customer', 'payment.downPayment', 'hotelRoomReserved', 'reservationMethod',)->paginate(10);
        }else{
            $reservation = $query->where('hotel_branch_id', $pic->hotel_branch_id)->with('payment.paymentDetail.paymentMethod', 'customer', 'payment.downPayment', 'hotelRoomReserved', 'reservationMethod',)->paginate(10);
        }
        
        return view('admin.finance.index', compact('reservation', 'paymentMethod', 'totalIncomeRoom', 'totalDownPayment'));
    }

    public function getFinanceDataBranch()
    {
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        
        $reservation = Reservation::where('hotel_branch_id', $pic->hotel_branch_id)->with('payment.paymentDetail', 'customer', 'payment.downPayment', 'hotelRoomReserved')->get();
    }

}
