<?php

namespace App\Models;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonationEquipment extends Model
{
    use HasFactory;
    
    public function donations()
    {
        return $this->belongsToMany(Donation::class);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }
}
