<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PlumbersController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\AppointmentController as AppointmentController_client;
use App\Http\Controllers\Admin\AppointmentController as AppointmentController_admin;

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::resource('plumbers', PlumbersController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('services', ServiceController::class);
    Route::get('appointments', [AppointmentController_admin::class, 'index']);
    Route::get('appointments/{appointment_id}/accepter', [AppointmentController_admin::class, 'accepter']);
    Route::get('appointments/{appointment_id}/refuser', [AppointmentController_admin::class, 'refuser']);
});

Route::get('service/{service_id}/appointment', [AppointmentController_client::class, 'create']);

Route::post('appointment', [AppointmentController_client::class, 'store']);
Route::get('appointments', [AppointmentController_client::class, 'index'])->middleware('auth');
Route::post('add_photo', function(Request $request){
    // return $request->image->store('images');
    return $request->date;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
