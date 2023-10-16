<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAmenitiesTmp extends Model
{
    use HasFactory;

    protected $table = 'payment_amenities_tmp';

    protected $guarded = [
        'id'
    ];

    public function amenities()
    {
        return $this->belongsTo(Amenities::class);
    }
}
