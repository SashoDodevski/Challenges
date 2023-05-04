<?php

namespace App\Models;

use App\Models\ClientEquipment;
use App\Models\DonationEquipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipment extends Model
{
    use HasFactory;

    public function client_equipment()
    {
        return $this->hasOne(ClientEquipment::class);
    }

    public function donation_equipment()
    {
        return $this->hasOne(DonationEquipment::class);
    }
}
