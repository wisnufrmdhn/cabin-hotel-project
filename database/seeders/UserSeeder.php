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
                'name' => 'admin-gandekan',
                'email' => 'admin.gandekan@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-ambassador',
                'email' => 'admin.ambassador@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-bhayangkara',
                'email' => 'admin.bhayangkara@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-grand',
                'email' => 'admin.grand@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-mantrijeron',
                'email' => 'admin.mantrijeron@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-rru',
                'email' => 'admin.rru@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-sagan',
                'email' => 'admin.sagan@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-sutomo',
                'email' => 'admin.sutomo@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-tanjung',
                'email' => 'admin.tanjung@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'admin-ngupasan',
                'email' => 'admin.ngupasan@gmail.com',
                'role_id' => '2',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
