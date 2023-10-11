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
                'hotel_name' => 'The Cabin Purwokinanti',
                'hotel_address' => 'Jl. Juminahan No.48, Purwokinanti, Pakualaman, Kota Yogyakarta',
                'hotel_code' => 'PWK',
            ],
        ];

        foreach ($hotelBranches as $key => $value) {
            HotelBranch::create($value);
        }
    }
}
