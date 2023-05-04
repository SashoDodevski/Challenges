<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Donation;
use App\Models\HistoryStatus;
use App\Models\ApplicationStatus;
use App\Models\ApplicationDonation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function applicationStatus()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function historyStatus()
    {
        return $this->belongsTo(HistoryStatus::class);
    }

    public function application_donations()
    {
        return $this->hasOne(ApplicationDonation::class);
    }
}
