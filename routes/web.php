<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
});

Route::post('/loginCheck', [AuthController::class, 'loginCheck'])->name('login.post'); 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// This is admin route access
Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});