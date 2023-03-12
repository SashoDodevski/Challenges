<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = new Role();
        $roleAdmin->name = 'Admin';
        $roleAdmin->save();

        $roleGuest = new Role();
        $roleGuest->name = 'Guest';
        $roleGuest->save();
    }
}
