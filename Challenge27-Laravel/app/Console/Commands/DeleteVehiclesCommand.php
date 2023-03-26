<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Illuminate\Console\Command;

class DeleteVehiclesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:vehicles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes vehicles with expired insurances from database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        
        $expiredInsurances = Vehicle::onlyTrashed()->get();

        foreach($expiredInsurances as $vehicle) {
            $vehicle->forceDelete();
        }
    }
}
