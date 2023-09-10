<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;

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
            Route::post('/store-customer', [ReservationController::class, 'storeCustomer'])->name('store-customer');
        });
    });
});
