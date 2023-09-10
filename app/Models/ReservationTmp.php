<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTmp extends Model
{
    use HasFactory;

    protected $table = 'reservations_tmp';

    protected $guarded = [
        'id'
    ];
}
