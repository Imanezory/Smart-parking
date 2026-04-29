<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ParkingSpot; 
class Reservation extends Model
{
 protected $fillable = [
    'parking_spot_id',
    'start_time',
    'end_time',
    'name',
    'phone',
    'vehicle_type',
    'price'
];


public function parkingSpot()
{
    return $this->belongsTo(ParkingSpot::class);
}
}
