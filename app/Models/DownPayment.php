<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownPayment extends Model
{
    use HasFactory;

    protected $table = 'down_payments';

    protected $guarded = [
        'id'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
