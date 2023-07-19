<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $user;
    public $userProfile;
    
    public function mount(User $user)
    {
        $this->user = User::query()
        ->where('users.id', $user->id)
        ->join('primary_addresses', 'primary_addresses.user_id', '=', 'users.id')
        ->join('secondary_addresses', 'secondary_addresses.user_id', '=', 'users.id')
        ->select('users.id','name', 'email', 'profile_photo_path', 'primary_addresses.city as primary_city', 'primary_addresses.street as primary_street', 'primary_addresses.postcode as primary_postcode', 'primary_addresses.country as primary_country','secondary_addresses.city as secondary_city', 'secondary_addresses.street as secondary_street', 'secondary_addresses.postcode as secondary_postcode', 'secondary_addresses.country as secondary_country')
        ->first();
        
    }


    public function render()
    {
        return view('livewire.user-profile');
    }
}
