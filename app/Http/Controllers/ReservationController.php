<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\ParkingSpot;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create($id)
    {
        $spot = ParkingSpot::findOrFail($id);
        return view('reservation', compact('spot'));
    }


public function store(Request $request)
{
    $request->validate([
        'spot_id'      => 'required|exists:parking_spots,id',
        'start'        => 'required|date',
        'end'          => 'required|date|after:start',
        'name'         => 'required|string|max:255',
        'phone'        => 'required|string',
        'vehicle_type' => 'required|string'
    ]);

    // Convertir en dates
    $start = Carbon::parse($request->start);
    $end   = Carbon::parse($request->end);

    // Calcul durée en minutes
    $minutes = $start->diffInMinutes($end);

    // Calcul prix (1 Dh chaque 5 minutes)
    $price = ceil($minutes / 5) * 1;

    // Création réservation avec prix
    $reservation = Reservation::create([
        'parking_spot_id' => $request->spot_id,
        'start_time'      => $start,
        'end_time'        => $end,
        'name'            => $request->name,
        'phone'           => $request->phone,
        'vehicle_type'    => $request->vehicle_type,
        'price'           => $price // <-- important
    ]);

    $spot = ParkingSpot::findOrFail($request->spot_id);
    $spot->status = 'occupied';
    $spot->save();

    $reservation->load('parkingSpot');

    $pdf = Pdf::loadView('pdf.recu', compact('reservation'));

    return response()->streamDownload(
        fn () => print($pdf->output()),
        "recu_reservation.pdf"
    );
}
    public function index()
    {
        $reservations = Reservation::with('parkingSpot')->latest()->get();
        return view('reservations_list', compact('reservations'));
    }
}