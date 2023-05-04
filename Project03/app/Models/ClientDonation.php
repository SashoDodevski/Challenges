<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientDonation extends Model
{
    use HasFactory;

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }

    public function donations()
    {
        return $this->belongsToMany(Donation::class);
    }
}
