<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $guarded = [
        'id'
    ];

    public function reservationMethod()
    {
        return $this->belongsTo(ReservationMethod::class);
    }

    public function hotelRoomReserved()
    {
        return $this->hasMany(HotelRoomReserved::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
