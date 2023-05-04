<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Equipment;
use App\Models\Application;
use App\Models\EquipmentType;
use App\Models\ClientDonation;
use App\Models\DonationEquipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function client()
    {
        return $this->belongsToMany(Client::class, 'client_donations',  'donation_id', 'client_id');
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'donation_equipment', 'donation_id', 'equipment_id');
    }

    public function equipment_type()
    {
        return $this->belongsTo(EquipmentType::class);
    }

    public function client_donation()
    {
        return $this->hasOne(ClientDonation::class);
    }

    public function donation_equipment()
    {
        return $this->hasOne(DonationEquipment::class);
    }
}
