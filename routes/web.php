<?php

use App\Http\Controllers\AdminDetailEventController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('index');
//});



Route::get('/', [DonationController::class, 'index'])->name('index');
Route::get('/chart', [DonationController::class, 'chart']);


//login routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');



//////////////////////////////////////////////  EVENT   ////////////////////////////////////////////////

Route::get('admin/dashboard', [AdminEventController::class, 'index'])->name('dashboardPage');
// event table
Route::get('admin/event', [AdminEventController::class, 'eventTable'])->name('tableEvent');
// delete event
Route::get('/admin/event/delete/{id}', [AdminEventController::class, 'destroy'])->name('deleteEvent');
// add event
Route::post('/admin/event/post', [AdminEventController::class, 'store'])->name('postEvent');
// edit event
Route::post('/admin/event/update/{id}', [AdminEventController::class, 'update'])->name('updateEvent');
// finish event
Route::get('/admin/event/finish/{id}', [AdminEventController::class, 'finishEvent']);

// event report
Route::get('/admin/event/report/{id}', [AdminEventController::class, 'eventReport']);



//////////////////////////////////////////////  DONATION   ////////////////////////////////////////////////
// detail event page
Route::get('admin/event/detail/{id}', [AdminDetailEventController::class, 'index'])->name('detailEvent');
// post donate
Route::post('admin/event/detail/postdonation/{id}', [AdminDetailEventController::class, 'store'])->name('postDonation');
// delete donation
Route::get('admin/event/detail/deletedonation/{event_id}/{donate_id}', [AdminDetailEventController::class, 'destroy'])->name('deleteDonation');


