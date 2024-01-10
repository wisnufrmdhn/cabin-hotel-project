<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
use App\Exports\ReportFinanceFOExport;
use Carbon\Carbon;


class ExcelController extends Controller
{
    public function exportReportFinanceFO($from, $to)
    {
        return Excel::download(new ReportFinanceFOExport($from, $to), 'report-finance-fo.xlsx');
    }
}
