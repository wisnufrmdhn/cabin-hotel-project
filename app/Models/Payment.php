<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $guarded = ['
        id
    '];

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    public function downPayment()
    {
        return $this->hasOne(DownPayment::class);
    }
}
