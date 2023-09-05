<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = [
            [
                'payment_method' => 'Cash',
            ],
            [
                'payment_method' => 'Card',
            ],
            [
                'payment_method' => 'Qris',
            ],
            [
                'payment_method' => 'Transfer',
            ],
        ];

        foreach ($paymentMethods as $key => $value) {
            PaymentMethod::create($value);
        }
    }
}
