<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::create(['name' => 'admin', 'description' => 'Administrator']);
        Role::create(['name' => 'staff', 'description' => 'Staff']);
        Role::create(['name' => 'user', 'description' => 'Normal User']);
    }

}