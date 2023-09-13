<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomRate extends Model
{
    use HasFactory;

    protected $table = 'hotel_room_rates';

    protected $guarded = ['
        id
    '];
}
