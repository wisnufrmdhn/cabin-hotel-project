<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HotelRoomDetail;

class HotelRoomDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelRoomDetail = [
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 1,
                'room_number' => 102,
                'room_rates' => 100000,
                'room_duration' => 8,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 1,
                'room_number' => 102,
                'room_rates' => 220000,
                'room_duration' => 24,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 1,
                'room_number' => 106,
                'room_rates' => 100000,
                'room_duration' => 8,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 1,
                'room_number' => 106,
                'room_rates' => 220000,
                'room_duration' => 24,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 2,
                'room_number' => 107,
                'room_rates' => 155000,
                'room_duration' => 8,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 2,
                'room_number' => 107,
                'room_rates' => 285000,
                'room_duration' => 24,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 2,
                'room_number' => 111,
                'room_rates' => 285000,
                'room_duration' => 8,
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 2,
                'room_number' => 111,
                'room_rates' => 285000,
                'room_duration' => 24,
            ],
        ];

        foreach ($hotelRoomDetail as $key => $value) {
            HotelRoomDetail::create($value);
        }
    }
}
