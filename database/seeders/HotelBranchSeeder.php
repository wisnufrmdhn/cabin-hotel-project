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
            [
                'hotel_name' => 'The Cabin Gandekan',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'GDK',
            ],
            [
                'hotel_name' => 'The Cabin Ambassador',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'ABD',
            ],
            [
                'hotel_name' => 'The Cabin Bhayangkara',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'BHK',
            ],
            [
                'hotel_name' => 'The Cabin Grand',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'GRD',
            ],
            [
                'hotel_name' => 'The Cabin Mantrijeron',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'MTR',
            ],
            [
                'hotel_name' => 'The Cabin RRU',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'RRU',
            ],
            [
                'hotel_name' => 'The Cabin Sagan',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'GRD',
            ],
            [
                'hotel_name' => 'The Cabin Sutomo',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'STM',
            ],
            [
                'hotel_name' => 'The Cabin Tanjung',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'TJG',
            ],
            [
                'hotel_name' => 'The Cabin Ngupasan',
                'hotel_address' => 'Kota Yogyakarta',
                'hotel_code' => 'NGU',
            ],
        ];

        foreach ($hotelBranches as $key => $value) {
            HotelBranch::create($value);
        }
    }
}
