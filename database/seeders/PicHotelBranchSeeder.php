<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PicHotelBranch;

class PicHotelBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pic = [
            [
                'hotel_branch_id' => 1,
                'user_id' => 2,
            ],
            [
                'hotel_branch_id' => 2,
                'user_id' => 3,
            ],
            [
                'hotel_branch_id' => 3,
                'user_id' => 4,
            ],
            [
                'hotel_branch_id' => 4,
                'user_id' => 5,
            ],
            [
                'hotel_branch_id' => 5,
                'user_id' => 6,
            ],
            [
                'hotel_branch_id' => 6,
                'user_id' => 7,
            ],
            [
                'hotel_branch_id' => 7,
                'user_id' => 8,
            ],
            [
                'hotel_branch_id' => 8,
                'user_id' => 9,
            ],
            [
                'hotel_branch_id' => 9,
                'user_id' => 10,
            ],
            [
                'hotel_branch_id' => 10,
                'user_id' => 11,
            ],
            [
                'hotel_branch_id' => 11,
                'user_id' => 12,
            ]
        ];

        foreach ($pic as $key => $value) {
            PicHotelBranch::create($value);
        }
    }
}
