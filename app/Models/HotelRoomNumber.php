<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomNumber extends Model
{
    use HasFactory;

    protected $table = 'hotel_room_numbers';

    protected $guarded = ['
        id
    '];

    public function hotelRoomReservedTmp()
    {
        return $this->belongsTo(HotelRoomReservedTmp::class);
    }

    public function hotelRoom()
    {
        return $this->belongsTo(HotelRoom::class);
    }
}
