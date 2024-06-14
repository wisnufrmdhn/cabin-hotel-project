<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HotelBranch;

class HotelBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelBranches = [
            [
                'hotel_name' => 'The Cabin Tugu',
                'hotel_address' => 'Jl. Margo Utomo No.9, Gowongan, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55232',
                'hotel_code' => 'TGU',
            ],
            [
                'hotel_name' => 'The Cabin Sutomo',
                'hotel_address' => 'Jl. Doktor Sutomo No.2, Baciro, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55211',
                'hotel_code' => 'STM',
            ]
        ];

        foreach ($hotelBranches as $key => $value) {
            HotelBranch::create($value);
        }
    }
}
