<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationMethod extends Model
{
    use HasFactory;

    protected $table = 'reservation_methods';

    protected $guarded = ['
        id
    '];

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
