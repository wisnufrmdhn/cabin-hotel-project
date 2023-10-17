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

    public function hotelRoomReserved()
    {
        return $this->belongsTo(HotelRoomReserved::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'id');
    }
}
