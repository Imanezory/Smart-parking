<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\ParkingSpot;

class AdminController extends Controller
{
    public function index()
    {
        // 1. On libère les spots dont la réservation est finie
        $expiredSpotIds = Reservation::where('end_time', '<', now())
            ->pluck('parking_spot_id');

        if ($expiredSpotIds->count() > 0) {
            ParkingSpot::whereIn('id', $expiredSpotIds)
                ->update(['status' => 'free']);
        }

        // 2. On récupère les réservations pour l'affichage
        $reservations = Reservation::with('parkingSpot')->latest()->get();

        return view('admin', compact('reservations'));
    }

    public function delete($id)
    {
        $res = Reservation::findOrFail($id);
        
        // Optionnel : Libérer la place si on supprime une réservation active
        ParkingSpot::where('id', $res->parking_spot_id)->update(['status' => 'free']);
        
        $res->delete();
        return back()->with('success', 'Réservation supprimée');
    }
}