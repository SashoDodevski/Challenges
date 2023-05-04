<?php

namespace App\Models;

use App\Models\Donation;
use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicationStatus extends Model
{
    use HasFactory;

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
