<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomDetail extends Model
{
    use HasFactory;

    protected $table = 'hotel_room_details';

    protected $guarded = ['
        id
    '];
}
