<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Amenities;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            [
                'amenities' => 'Breakfast',
                'price' => 20000,
            ],
            [
                'amenities' => 'Extra Bed',
                'price' => 100000,
            ],
        ];

        foreach ($amenities as $key => $value) {
            Amenities::create($value);
        }
    }
}
