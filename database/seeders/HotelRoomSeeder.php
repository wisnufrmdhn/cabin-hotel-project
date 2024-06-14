<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HotelRoom;

class HotelRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelRooms = [
            [
                'room_type' => 'Small Shared',
            ],
            [
                'room_type' => 'Small Private',
            ],
            [
                'room_type' => 'Big Shared',
            ],
            [
                'room_type' => 'Big Private',
            ],
            [
                'room_type' => 'Family Shared',
            ],
            [
                'room_type' => 'Family Private',
            ],
            [
                'room_type' => 'Family Shared Bathroom',
            ],
            [
                'room_type' => 'Family Private Bathroom',
            ],
           
        ];

        foreach ($hotelRooms as $key => $value) {
            HotelRoom::create($value);
        }
    }
}
