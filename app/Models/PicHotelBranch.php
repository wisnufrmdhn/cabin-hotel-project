<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicHotelBranch extends Model
{
    use HasFactory;

    protected $table = 'pic_hotel_branches';

    protected $guarded = ['
        id
    '];
}
