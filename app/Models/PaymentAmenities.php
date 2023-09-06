<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymemtAmenities extends Model
{
    use HasFactory;

    protected $table = 'payment_amenities';

    protected $guarded = [
        'id'
    ];
}
