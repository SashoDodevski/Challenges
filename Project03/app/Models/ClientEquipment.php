<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Equipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientEquipment extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }
}
