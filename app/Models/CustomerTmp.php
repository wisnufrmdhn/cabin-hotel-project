<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTmp extends Model
{
    use HasFactory;

    protected $table = 'customers_tmp';

    protected $guarded = [
        'id'
    ];
}
