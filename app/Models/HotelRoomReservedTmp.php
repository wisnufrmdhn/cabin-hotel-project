<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomReservedTmp extends Model
{
    use HasFactory;

    protected $table = 'hotel_rooms_reserved_tmp';

    protected $guarded = [
        'id'
    ];

    public function reservationTmp()
    {
        return $this->hasOne(ReservationTmp::class, 'id');
    }

    public function hotelRoomNumber()
    {
        return $this->belongsTo(hotelRoomNumber::class);
    }
}
