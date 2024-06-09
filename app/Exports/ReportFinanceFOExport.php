<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\PaymentAmenitiesTmp;
use App\Models\HotelBranch;
use App\Models\HotelRoomReserved;
use App\Models\PaymentAmenities;
use Illuminate\Support\Facades\Auth;
use App\Models\PicHotelBranch;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ReportFinanceFOExport implements FromView
{
    use Exportable;

    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {

        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();
        $branchId = $pic->hotel_branch_id;
        $fromDate = $this->from;
        $toDate = $this->to;

        $query = PaymentDetail::query();

        $roomIncome = $query->whereHas('payment', function ($query) use ($branchId, $fromDate, $toDate) {
            //$query->whereNotIn('payment_status', ['DP', 'DP 2']);
            $query->whereHas('reservation', function ($query) use ($branchId, $fromDate, $toDate) {
                $query->where('hotel_branch_id', $branchId)->whereDate('reservation_start_date', '>=', $fromDate)->whereDate('reservation_start_date', '<=', $toDate);
            });
        })->with('payment', 'paymentMethod', 'payment.downPayment', 'payment.reservation')->get();

        // $reservation = Reservation::whereDate('created_at', '>=', $this->from)->whereDate('created_at', '<=', $this->to)->where('hotel_branch_id', $pic->hotel_branch_id)->with('payment.paymentDetail.paymentMethod', 'customer', 'payment.downPayment', 'hotelRoomReserved', 'reservationMethod')->get();
        
        return view('excel.finance-fo', [
            'roomIncome' => $roomIncome 
        ]);
    }

    // public function query()
    // {
    //     $user = Auth::user();
    //     $pic = PicHotelBranch::where('user_id', $user->id)->first();

    //     return Reservation::query()->whereDate('created_at', '>=', $this->from)->whereDate('created_at', '<=', $this->to)->where('hotel_branch_id', $pic->hotel_branch_id)->with('payment.paymentDetail.paymentMethod', 'customer', 'payment.downPayment', 'hotelRoomReserved', 'reservationMethod');
    // }
}
