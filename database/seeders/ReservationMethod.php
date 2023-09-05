<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReservationType;

class ReservationMethod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservationMethods = [
            [
                'reservation_method' => 'Walk In'
            ],
            [
                'reservation_method' => 'Reservation'
            ],
            [
                'reservation_method' => 'Agoda'
            ],
            [
                'reservation_method' => 'Traveloka'
            ],
            [
                'reservation_method' => 'Booking.com'
            ],
            [
                'reservation_method' => 'Tiket.com'
            ],
            [
                'reservation_method' => 'PegiPegi'
            ],
            [
                'reservation_method' => 'OTA Lainnya'
            ]
        ];

        foreach ($reservationMethods as $key => $value) {
            ReservationMethod::create($value);
        }
    }
}
