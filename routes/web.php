<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FinanceHeadOfficeController;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/loginCheck', [AuthController::class, 'loginCheck'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// This is admin route access
Route::group(['middleware' => ['auth']], function () {
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['loginCheck:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::group(['as' => 'reservation.', 'prefix' => 'reservation'], function () {
            Route::get('/', [ReservationController::class, 'index'])->name('index');
            Route::post('/store', [ReservationController::class, 'store'])->name('store');
            Route::post('/store-customer', [ReservationController::class, 'storeCustomer'])->name('store-customer');
            Route::post('/store-room-order', [ReservationController::class, 'storeRoomOrder'])->name('store-room-order');
            Route::post('/store-amenities', [ReservationController::class, 'storeAmenities'])->name('store-amenities');
            Route::post('/delete-customer/{id}', [ReservationController::class, 'deleteCustomer'])->name('delete-customer');
            Route::post('/delete-rooms/{id}', [ReservationController::class, 'deleteRooms'])->name('delete-rooms');
            Route::post('/delete-additional/{id}', [ReservationController::class, 'deleteAdditional'])->name('delete-additional');
        });

        Route::group(['as' => 'finance.', 'prefix' => 'finance'], function () {
            Route::get('/', [FinanceController::class, 'index'])->name('index');
            Route::post('/report/front-office', [FinanceController::class, 'reportFrontOffice'])->name('report.front-office');
            Route::post('/report/export-excel/front-office', [FinanceController::class, 'reportExcelFrontOffice'])->name('report.export-excel.front-office');
        });
        Route::group(['as' => 'bookinglist.', 'prefix' => 'bookinglist'], function () {
            Route::get('/', [BookingListController::class, 'index'])->name('index');
            Route::get('/{reservationCode?}', [BookingListController::class, 'show'])->name('show');
            Route::post('/store-new-payment', [BookingListController::class, 'storeNewPayment'])->name('store-new-payment');
        });
    });
    Route::get('/pdf/invoice/{invoiceId}', [PdfController::class, 'generateInvoice'])->name('pdf.invoices');
    Route::get('/pdf/invoice/detail-payment/{invoiceId}', [PdfController::class, 'generateDetailPaymentInvoice'])->name('pdf.invoices.detail-payment');
    Route::get('/pdf/report/finance-fo/{from?}/{to?}', [PdfController::class, 'generateReportFinanceFO'])->name('pdf.report.finance-fo');
    Route::get('/excel/report/finance-fo/{from?}/{to?}', [ExcelController::class, 'exportReportFinanceFO'])->name('excel.report.finance-fo');
    Route::get('/pdf/report/finance-ho/{from?}/{to?}/{branch?}', [PdfController::class, 'generateReportFinanceHO'])->name('pdf.report.finance-ho');
});

// This is financeHO route access
Route::group(['middleware' => ['auth']], function () {
    Route::group(['as' => 'financeHO.', 'prefix' => 'financeHO', 'middleware' => ['loginCheck:financeHO']], function () {
        Route::get('/', [FinanceHeadOfficeController::class, 'index'])->name('index');
        Route::post('/report/head-office', [FinanceHeadOfficeController::class, 'reportHeadOffice'])->name('report.head-office');
        Route::post('/report/export-excel/head-office', [FinanceHeadOfficeController::class, 'reportExcelHeadOffice'])->name('report.export-excel.head-office');
    });
});

Route::group(['as' => 'ajax.', 'prefix' => 'ajax'], function () {
    Route::get('/getListCustomers', [AjaxController::class, 'getListCustomers'])->name('list-customers');
    Route::get('/getRoomNumbers/{roomType}', [AjaxController::class, 'getRoomNumbers'])->name('room-numbers');
});

Route::group(['as' => 'endpoint.', 'prefix' => 'endpoint'], function () {
    Route::get('/reservation/{reservationId}', [AjaxController::class, 'getReservationData'])->name('get-reservation');
    Route::put('/reservation/{reservationId}/{status}', [AjaxController::class, 'updateReservationData'])->name('update-reservation');
    Route::get('/update-reservation/{reservationId}/{status}', [AjaxController::class, 'updateReservationData'])->name('get-update-reservation');
});
