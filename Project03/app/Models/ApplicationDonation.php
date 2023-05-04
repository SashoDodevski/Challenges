<?php

namespace App\Models;

use App\Models\Donation;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicationDonation extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
