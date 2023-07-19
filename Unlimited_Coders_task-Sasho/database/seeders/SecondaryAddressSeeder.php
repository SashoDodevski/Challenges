<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\SecondaryAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SecondaryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users_id = User::orderBy('id', 'asc')->pluck('id');

        foreach($users_id as $user_id)
        {
            $secondaryAddress = new SecondaryAddress();
            $secondaryAddress->user_id = $user_id;
            $secondaryAddress->city = fake()->city();
            $secondaryAddress->street = fake()->streetName();
            $secondaryAddress->postcode = fake()->postcode();
            $secondaryAddress->country = fake()->country();
            $secondaryAddress->save();
        }
    }
}
