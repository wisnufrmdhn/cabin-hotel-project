<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetailTmp extends Model
{
    use HasFactory;

    protected $table = 'reservations_details_tmp';

    protected $guarded = [
        'id'
    ];

    public function hotelRoomReservedTmp()
    {
        return $this->belongsTo(HotelRoomReservedTmp::class);
    }

    public function reservationTmp()
    {
        return $this->belongsTo(ReservationTmp::class);
    }
}
