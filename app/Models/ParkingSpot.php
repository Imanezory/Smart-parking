<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingSpot extends Model
{
    // ✅ مهم بزاف
    protected $fillable = [
        'parking_id',
        'sensor_id',
        'spot_number',
        'status'
    ];

    // relation
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}