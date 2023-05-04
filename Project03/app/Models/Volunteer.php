<?php

namespace App\Models;

use App\Models\VolunteerPosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Volunteer extends Model
{
    use HasFactory;

    public function volunteerPosition()
    {
        return $this->belongsTo(VolunteerPosition::class);
    }
}
