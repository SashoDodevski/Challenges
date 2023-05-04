<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Document;
use App\Models\Equipment;
use App\Models\Application;
use App\Models\HistoryStatus;
use App\Models\ClientDonation;
use App\Models\ClientEquipment;
use App\Models\ApplicationStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Client extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->hasOne(Application::class);
    }

    public function applicationStatus()
    {
        return $this->belongsToMany(ApplicationStatus::class, 'applications', 'client_id', 'application_status_id');
    }

    public function historyStatus()
    {
        return $this->belongsToMany(HistoryStatus::class, 'applications', 'client_id', 'history_status_id');
    }

    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
    
    public function client_donation()
    {
        return $this->hasOne(ClientDonation::class);
    }

    public function client_equipment()
    {
        return $this->hasOne(ClientEquipment::class);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class, 'client_equipment', 'client_id', 'equipment_id');
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }
}
