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
// use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\FinanceExport;

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
        $queryReservation = Reservation::query();
        $queryDP = Reservation::query();
        $query = PaymentDetail::query();

        $getReservation = $queryReservation->where('hotel_branch_id', $pic->hotel_branch_id)->get();
        $reservationId = [];
        $paymentId = [];

        foreach ($getReservation as $reservationData) {
            $reservationId[] = $reservationData->id;
            $paymentId[] = $reservationData->payment_id;
        }   

        $dateNow = Carbon::now('Asia/Bangkok')->isoFormat('DD MMMM YYYY');
        $dateQuery = Carbon::now()->toDateString();
        
        $totalIncomeRoom = Payment::whereIn('id', $paymentId)->whereDate('created_at', $dateQuery)->sum('total_payment');
        $totalIncomeRoom = number_format($totalIncomeRoom, 0, ',', '.');
        $totalDownPayment = DownPayment::whereIn('payment_id', $paymentId)->whereDate('created_at', $dateQuery)->sum('down_payment');
        $totalDownPayment = number_format($totalDownPayment, 0, ',', '.');

        if(!$request->has('_token')){
            $roomIncome = $query->whereHas('payment', function ($query) use ($branchId, $dateQuery) {
                //$query->whereNotIn('payment_status', ['DP', 'DP 2']);
                $query->whereHas('reservation', function ($query) use ($branchId, $dateQuery) {
                    $query->where('hotel_branch_id', $branchId)->whereDate('reservation_start_date', $dateQuery);
                });
            })->with('payment', 'paymentMethod', 'payment.downPayment', 'payment.reservation')->paginate(10);

            return view('admin.finance.index', compact('paymentMethod', 'totalIncomeRoom', 'totalDownPayment', 'dateNow', 'roomIncome'));
        }else{

            // Apply filters based on dropdown selections
            if ($request->filled('payment_check')) {
                $paymentCheck = $request['payment_check'];

                $query->whereHas('payment', function ($query) use ($paymentCheck) {
                    $query->where('payment_check', $paymentCheck);
                });
            }
            
            if($request->filled('payment_method_id')){
                $paymentMethodId = $request['payment_method_id'];

                $query->whereHas('payment', function ($query) use ($paymentMethodId) {
                    $query->whereHas('paymentDetail', function ($query) use ($paymentMethodId) {
                        $query->where('payment_method_id', $paymentMethodId);
                    });
                });
            }

            // Apply filters based on dropdown selections
            if ($request->filled('payment_status')) {
                $paymentStatus = $request['payment_status'];

                if($paymentStatus == 'Lunas'){
                    $paymentStatuses = ['DP Langsung Lunas', 'Lunas', 'Lunas + DP 1', 'Lunas + DP 2'];
                    $query->whereHas('payment', function ($query) use ($paymentStatuses) {
                        $query->whereIn('payment_status', $paymentStatuses);
                    });
                }
            }
            
            if ($request->filled('payment_date')) {
                $paymentDate = $request['payment_date'];

                $query->whereHas('payment', function ($query) use ($paymentDate) {
                    $query->whereDate('updated_at', $paymentDate);
                });
            }

            if ($request->filled('checkin')) {
                $checkin = $request['checkin'];
                // Get the current date and time in GMT+7 timezone
                $computerTime = Carbon::now();
                // Add 7 hours to the current time
                $computerTime = $computerTime->addHours(7);
                // Extract only the time part from the computer datetime
                $computerTime = $computerTime->format('H:i:s');

                $query->whereHas('payment', function ($query) use ($branchId, $checkin, $computerTime, $dateQuery) {
                    if($dateQuery < $checkin){
                            $query->whereNotIn('payment_status', ['DP', 'DP 2']);
                            $query->whereHas('reservation', function ($query) use ($branchId, $checkin, $computerTime) {
                            $query->where('hotel_branch_id', $branchId)->whereDate('reservation_start_date', $checkin)->whereTime('reservation_start_date', '<', $computerTime);
                        });
                    }else{
                            $query->whereNotIn('payment_status', ['DP', 'DP 2']);
                            $query->whereHas('reservation', function ($query) use ($branchId, $checkin, $computerTime) {
                            $query->where('hotel_branch_id', $branchId)->whereDate('reservation_start_date', $checkin);
                        });
                    }
                });
            }

            if ($request->filled('checkout')) {
                $checkout = $request['checkout'];

                $query->whereHas('payment', function ($query) use ($branchId, $checkout) {
                    //$query->whereNotIn('payment_status', ['DP', 'DP 2']);
                    $query->whereHas('reservation', function ($query) use ($branchId, $checkout) {
                        $query->where('hotel_branch_id', $branchId)->whereDate('reservation_end_date', $checkout);
                    });
                });
            }

            $query->whereHas('payment.reservation', function ($query) use ($branchId) {
                    $query->where('hotel_branch_id', $branchId);
            });
            
            $roomIncome = $query->with('payment', 'paymentMethod', 'payment.downPayment', 'payment.reservation', 'payment.paymentDetail')->paginate(10);

            return view('admin.finance.index', compact('paymentMethod', 'totalIncomeRoom', 'totalDownPayment', 'dateNow', 'roomIncome'));
        }
    }

    public function reportFrontOffice(Request $request)
    {
        $from = $request['pdf_from'];
        $to = $request['pdf_to'];
        return redirect()->route('pdf.report.finance-fo', ['from' => $from, 'to' => $to]);
    }

    public function reportExcelFrontOffice(Request $request)
    {
        $from = $request['excel_from'];
        $to = $request['excel_to'];
        return redirect()->route('excel.report.finance-fo', ['from' => $from, 'to' => $to]);
    }

    // public function reportExcelFinance(Request $request)
    // {
    //     $paymentMethodId = $request->input('payment_method_id');
    //     $paymentStatus = $request->input('payment_status');
    //     $paymentDate = $request->input('payment_date');
    //     $checkin = $request->input('checkin');
    //     $checkout = $request->input('checkout');

    //     return Excel::download(new FinanceExport($paymentMethodId, $paymentStatus, $paymentDate, $checkin, $checkout), 'finance-fo.xlsx');
    // }
}
