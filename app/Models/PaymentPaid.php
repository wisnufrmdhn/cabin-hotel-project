<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPaid extends Model
{
    use HasFactory;

    protected $table = 'payment_paids';

    protected $guarded = ['
        id
    '];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
}
