<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomReserved extends Model
{
    use HasFactory;

    protected $table = 'hotel_rooms_reserved';

    protected $guarded = [
        'id'
    ];

    public function reservationDetail()
    {
        return $this->hasOne(ReservationDetail::class, 'id');
    }

    public function hotelRoomNumber()
    {
        return $this->belongsTo(hotelRoomNumber::class);
    }
}
