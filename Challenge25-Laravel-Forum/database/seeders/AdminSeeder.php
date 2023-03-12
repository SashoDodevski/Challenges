<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = new User();
        $userAdmin->role_id = Role::where('name', 'Admin')->first()->id;
        $userAdmin->name = 'Admin';
        $userAdmin->email = 'admin@admin.com';
        $userAdmin->password = Hash::make('Admin@123');
        $userAdmin->save();
    }
}
