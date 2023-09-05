<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'role_name' => 'superadmin',
            ],
            [
                'role_name' => 'admin',
            ],
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
