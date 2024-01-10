<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Payment;
use App\Models\PaymentAmenitiesTmp;
use App\Models\HotelBranch;
use App\Models\HotelRoomReserved;
use App\Models\PaymentAmenities;
use Illuminate\Support\Facades\Auth;
use App\Models\PicHotelBranch;
use Carbon\Carbon;

class ReportFinanceFOExport implements FromQuery
{
    use Exportable;

    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        $user = Auth::user();
        $pic = PicHotelBranch::where('user_id', $user->id)->first();

        return Reservation::query()->whereDate('created_at', '>=', $this->from)->whereDate('created_at', '<=', $this->to)->where('hotel_branch_id', $pic->hotel_branch_id)->with('payment.paymentDetail.paymentMethod', 'customer', 'payment.downPayment', 'hotelRoomReserved', 'reservationMethod');
    }
}
