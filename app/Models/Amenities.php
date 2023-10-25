<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    use HasFactory;

    protected $table = 'amenities';

    protected $guarded = [
        'id'
    ];

    public function paymentAmenitiesTmp()
    {
        return $this->hasOne(PaymentAmenitiesTmp::class);
    }

    public function paymentAmenities()
    {
        return $this->hasOne(PaymentAmenities::class);
    }
}
