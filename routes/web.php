<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

// بدل هذا 👇
Route::get('/', [ParkingController::class,'index']);
Route::post('/release-spot/{id}', [ParkingController::class, 'releaseSpot']);
Route::get('/parking', [ParkingController::class,'index']);
Route::post('/reserve', [ReservationController::class,'store']);
Route::get('/reservation/{id}', [ReservationController::class, 'create']);
Route::post('/reservation', [ReservationController::class, 'store']);
Route::get('/api/parking-status', [ParkingController::class, 'status']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/reservations', [ReservationController::class, 'index']);
Route::view('/ai', 'ai');