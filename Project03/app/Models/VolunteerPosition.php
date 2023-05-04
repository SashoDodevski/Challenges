<?php

namespace App\Models;

use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VolunteerPosition extends Model
{
    use HasFactory;

    protected $fillable = ['volunteer_position'];

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }
}
