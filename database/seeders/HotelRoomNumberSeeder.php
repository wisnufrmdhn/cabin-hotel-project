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
                'hotel_room_id' => 3,
                'room_number' => 202,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 3,
                'room_number' => 205,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 3,
                'room_number' => 206,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 3,
                'room_number' => 207,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 3,
                'room_number' => 208,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 3,
                'room_number' => 209,
                'room_status_id' => 3
            ],
            // =======================BIG SHARED
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 4,
                'room_number' => 102,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 4,
                'room_number' => 103,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 4,
                'room_number' => 105,
                'room_status_id' => 3
            ],
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 4,
                'room_number' => 203,
                'room_status_id' => 3
            ],
            // =======================BIG PRIVATE
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 7,
                'room_number' => 201,
                'room_status_id' => 3
            ],
            // =======================FAMILY SHARED BATHROOM
            [
                'hotel_branch_id' => 1,
                'hotel_room_id' => 8,
                'room_number' => 101,
                'room_status_id' => 3
            ],
            // =======================FAMILY PRIVATE BATHROOM
        ];

        foreach ($hotelRoomNumber as $key => $value) {
            HotelRoomNumber::create($value);
        }
    }
}
