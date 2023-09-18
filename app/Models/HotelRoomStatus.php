<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomStatus extends Model
{
    use HasFactory;

    protected $table = 'hotel_room_status';

    protected $guarded = ['
        id
    '];
}
