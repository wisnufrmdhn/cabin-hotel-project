<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelBranch extends Model
{
    use HasFactory;

    protected $table = 'hotel_branches';

    protected $guarded = ['
        id
    '];
}
