<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WorkShopController;
use App\Http\Controllers\WorkShopRelationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('price')->group(function(){
    Route::get('/', [PriceController::class, 'index'])->name('price-index');
    // Route::get('/{price}', [PriceController::class, 'find'])->name('price-find');
});
Route::prefix('price')->middleware('auth:sanctum')->group(function(){
    Route::post('/', [PriceController::class, 'store'])->name('price-store');
    Route::put('/{price}', [PriceController::class, 'update'])->name('price-update');
    Route::delete('/{price}', [PriceController::class, 'distroy'])->name('price-delete');
});

Route::prefix('nationality')->group(function(){
    Route::get('/', [NationalityController::class, 'index'])->name('nationality-index');
});
Route::prefix('nationality')->middleware('auth:sanctum')->group(function(){
    Route::post('/', [NationalityController::class, 'store'])->name('nationality-store');
    Route::put('/{nation}', [NationalityController::class, 'update'])->name('nationality-update');
    Route::delete('/{nation}', [NationalityController::class, 'distroy'])->name('nationality-delete');
});


Route::prefix('role-type')->group(function(){
    Route::get('/', [RoleController::class, 'index'])->name('nationality-index');
});
Route::prefix('role-type')->middleware('auth:sanctum')->group(function(){
    Route::post('/', [RoleController::class, 'store'])->name('nationality-store');
    Route::put('/{roleType}', [RoleController::class, 'update'])->name('nationality-update');
    Route::delete('/{roleType}', [RoleController::class, 'distroy'])->name('nationality-delete');
});

Route::prefix('workshop')->group(function(){
    Route::get('/', [WorkShopController::class, 'index'])->name('nationality-index');
});
Route::prefix('workshop')->middleware('auth:sanctum')->group(function(){
    Route::post('/', [WorkShopController::class, 'store'])->name('nationality-store');
    Route::put('/{workShop}', [WorkShopController::class, 'update'])->name('nationality-update');
    Route::delete('/{workShop}', [WorkShopController::class, 'distroy'])->name('nationality-delete');
});

Route::prefix('workshop-reation')->group(function(){
    Route::get('/', [WorkShopRelationController::class, 'index'])->name('price-index');
});
Route::prefix('workshop-reation')->middleware('auth:sanctum')->group(function(){
    Route::post('/', [WorkShopRelationController::class, 'store'])->name('price-store');
    Route::put('/{workShop}', [WorkShopRelationController::class, 'update'])->name('price-update');
    Route::delete('/{workShop}', [WorkShopRelationController::class, 'distroy'])->name('price-delete');
});



Route::prefix('booking')->middleware('guest')->group(function(){
    Route::get('/', [BookingController::class, 'index'])->name('booking-index');
// Route::get('/{time}', [BookingController::class, 'find'])->name('booking-find');
    Route::post('/', [BookingController::class, 'store'])->name('booking-store');
});


Route::prefix('session')->middleware('guest')->group(function(){
    Route::post('/', [SessionController::class, 'store'])->name('session-store');
    Route::delete('/', [SessionController::class, 'distroy'])->name('price-delete');
});