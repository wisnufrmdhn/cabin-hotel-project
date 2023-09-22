<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model
{
    use HasFactory;

    protected $table = 'reservation_details';

    protected $guarded = [
        'id'
    ];

    public function hotelRoomReserved()
    {
        return $this->belongsTo(HotelRoomReserved::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
