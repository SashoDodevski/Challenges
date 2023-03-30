<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'admin' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin@123'),
        ];        

        DB::table('users')->insert($admin);
    }
}
