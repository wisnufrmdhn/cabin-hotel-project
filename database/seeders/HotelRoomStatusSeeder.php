<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HotelRoomStatus;

class HotelRoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelRoomStatus = [
            [
                'room_status' => 'PMR (Sedang dibersihkan sesuai request tamu)'
            ],
            [
                'room_status' => 'Vacant Dirty'
            ],
            [
                'room_status' => 'Vacant Clean'
            ],
            [
                'room_status' => 'Occupied Clean'
            ],
            [
                'room_status' => 'Occupied By Guest'
            ],
            [
                'room_status' => 'Out Of Order'
            ],
        ];

        foreach ($hotelRoomStatus as $key => $value) {
            HotelRoomStatus::create($value);
        }
    }
}
