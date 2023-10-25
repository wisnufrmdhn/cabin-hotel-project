<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAmenities extends Model
{
    use HasFactory;

    protected $table = 'payment_amenities';

    protected $guarded = [
        'id'
    ];

    public function amenities()
    {
        return $this->belongsTo(Amenities::class);
    }
}
