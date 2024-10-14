<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/','welcome');

// Route::prefix('price')->middleware('auth')->group(function(){
//     Route::get('/', [PriceController::class, 'index'])->name('price-index')->middleware('guest')->excludedMiddleware('auth');
//     // Route::get('/{price}', [PriceController::class, 'find'])->name('price-find');
//     Route::post('/', [PriceController::class, 'store'])->name('price-store');
//     Route::put('/{price}', [PriceController::class, 'update'])->name('price-update');
//     Route::delete('/{price}', [PriceController::class, 'delete'])->name('price-delete');
// });



// Route::prefix('booking')->middleware('guest')->group(function(){
//     Route::get('/', [BookingController::class, 'index'])->name('booking-index');
//     // Route::get('/{time}', [BookingController::class, 'find'])->name('booking-find');
//     Route::post('/', [BookingController::class, 'store'])->name('booking-store');
// });


// Route::prefix('session')->middleware('guest')->group(function(){
//     Route::post('/', [SessionController::class, 'store'])->name('session-store');
//     Route::delete('/', [SessionController::class, 'distroy'])->name('price-delete');
// });