<?php

namespace App\Models;

use App\Models\PartnerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    public function partnerType()
    {
        return $this->hasOne(PartnerType::class);
    }
}
