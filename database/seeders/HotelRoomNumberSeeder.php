<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HotelRoomNumber;

class HotelRoomNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelRoomNumber = [
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 1,
                'room_number' => 102
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 1,
                'room_number' => 106
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 2,
                'room_number' => 107
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 2,
                'room_number' => 111
            ],
        ];

        foreach ($hotelRoomNumber as $key => $value) {
            HotelRoomNumber::create($value);
        }
    }
}
