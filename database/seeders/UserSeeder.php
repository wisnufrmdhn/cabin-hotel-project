<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'role_id' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin.sutomo',
                'email' => 'duta.tugu@cabin.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin.sutomo',
                'email' => 'nada.tugu@cabin.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin.tugu',
                'email' => 'admin.tugu@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
