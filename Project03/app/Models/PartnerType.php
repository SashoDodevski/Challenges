<?php

namespace App\Models;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerType extends Model
{
    use HasFactory;

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
}
