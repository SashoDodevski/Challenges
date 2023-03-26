<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        for ($i = 0; $i < 10; $i++) {
            $vehicle = new Vehicle();
            $vehicle->brand = $faker->vehicleBrand;
            $vehicle->model = $faker->vehicleModel;
            $vehicle->plate_number = $faker->vehicleRegistration;
            $vehicle->insurance_date = $faker->dateTimeBetween('-14 months', '-2 months');

            $insuranceDate = $vehicle->insurance_date;
            $insuranceDate = date_format($insuranceDate, 'd-m-Y');
            $expirationDate = date('Y-m-d', strtotime($insuranceDate . ' + 12 months'));

            $endDate = date_create($expirationDate);

            if($endDate < date_create(date('Y-m-d'))){
                $vehicle->deleted_at = $endDate;
            };

            $vehicle->save();
        }
    }
}
