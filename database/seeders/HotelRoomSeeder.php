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
                'room_type' => 'Deluxe',
            ],
            [
                'room_type' => 'Big',
            ],
            [
                'room_type' => 'Small',
            ],
        ];

        foreach ($hotelRooms as $key => $value) {
            HotelRoom::create($value);
        }
    }
}
