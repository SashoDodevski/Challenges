<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PrimaryAddress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrimaryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users_id = User::orderBy('id', 'asc')->pluck('id');

        foreach($users_id as $user_id)
        {
            $primaryAddress = new PrimaryAddress();
            $primaryAddress->user_id = $user_id;
            $primaryAddress->city = fake()->city();
            $primaryAddress->street = fake()->streetName();
            $primaryAddress->postcode = fake()->postcode();
            $primaryAddress->country = fake()->country();
            $primaryAddress->save();
        }
    }
}
