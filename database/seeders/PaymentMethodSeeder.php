<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
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
                'payment_method' => 'Credit Card BCA',
            ],
            [
                'payment_method' => 'Credit Card BRI',
            ],
            [
                'payment_method' => 'Credit Card BNI',
            ],
            [
                'payment_method' => 'Credit Card Mandiri',
            ],
            [
                'payment_method' => 'Credit Card CIMB',
            ],
            [
                'payment_method' => 'Debit Card BCA',
            ],
            [
                'payment_method' => 'Debit Card BRI',
            ],
            [
                'payment_method' => 'Debit Card BNI',
            ],
            [
                'payment_method' => 'Debit Card Mandiri',
            ],
            [
                'payment_method' => 'Debit Card CIMB',
            ],
            [
                'payment_method' => 'Transfer BCA',
            ],
            [
                'payment_method' => 'Transfer BRI',
            ],
            [
                'payment_method' => 'Transfer BNI',
            ],
            [
                'payment_method' => 'Transfer Mandiri',
            ],
            [
                'payment_method' => 'Transfer CIMB',
            ],
            [
                'payment_method' => 'QRIS BCA',
            ],
            [
                'payment_method' => 'QRIS BRI',
            ],
            [
                'payment_method' => 'QRIS BNI',
            ],
            [
                'payment_method' => 'QRIS Mandiri',
            ],
            [
                'payment_method' => 'QRIS CIMB',
            ],
            [
                'payment_method' => 'OTA Traveloka',
            ],
            [
                'payment_method' => 'OTA PegiPegi',
            ],
            [
                'payment_method' => 'OTA Booking.com',
            ],
            [
                'payment_method' => 'OTA Agoda',
            ],
            [
                'payment_method' => 'OTA Tiket.com',
            ],
            [
                'payment_method' => 'OTA MG Holiday',
            ],
            [
                'payment_method' => 'OTA Air BNB',
            ],
            [
                'payment_method' => 'OTA Lainnya',
            ],
            [
                'payment_method' => 'VA BCA',
            ],
            [
                'payment_method' => 'VA BRI',
            ],
            [
                'payment_method' => 'VA BNI',
            ],
            [
                'payment_method' => 'VA Mandiri',
            ],
            [
                'payment_method' => 'VA CIMB',
            ],
            [
                'payment_method' => 'VA BSI',
            ],
            [
                'payment_method' => 'VA Danamon',
            ],
            [
                'payment_method' => 'VA Permata',
            ],
            [
                'payment_method' => 'VA by Doku',
            ],
        ];

        foreach ($paymentMethods as $key => $value) {
            PaymentMethod::create($value);
        }
    }
}
