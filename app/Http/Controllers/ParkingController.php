<?php

namespace App\Http\Controllers;

use App\Models\ParkingSpot;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ParkingController extends Controller
{

// Dans la méthode où tu affiches le parking (ex: index)
public function index() {
    $now = now();

    // 1. Libérer automatiquement les places dont la réservation est expirée
    $expiredSpots = ParkingSpot::where('status', 'occupied')
        ->whereDoesntHave('reservations', function ($query) use ($now) {
            $query->where('end_time', '>', $now);
        })->get();

    foreach ($expiredSpots as $spot) {
        $spot->status = 'free';
        $spot->save();
    }

    $spots = ParkingSpot::with('reservations')->get();
    return view('parking', compact('spots'));
}
public function status()
{
    // تحديث الحالات
    $expired = \App\Models\Reservation::where('end_time','<',now())->get();

    foreach($expired as $res){
        \App\Models\ParkingSpot::where('id',$res->parking_spot_id)
            ->update(['status'=>'free']);
    }

    // رجع JSON
    $spots = \App\Models\ParkingSpot::all();

    return response()->json($spots);
}
}
