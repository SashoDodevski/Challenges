<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DashboardTable extends Component
{
    use WithPagination;

    public $sortField = 'name';
    public $sortDirection = 'asc';

    public $confirmDeletingUser = false;
    public $confirmationMessage = false;

    public $per_page = 10;

    public function sortBy($field) 
    {
        if($this->sortField === $field)
        {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }
        else{
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    protected $queryString = ['sortField', 'sortDirection'];

    public function selectedUser($user_id) 
     {
        $this->confirmDeletingUser = $user_id;
    }

    public function deleteUser (User $user)
    {
            $user->delete();
            $this->confirmDeletingUser = false;
            $this->confirmationMessage = true;
    }

    public function render()
    {
        $users = User::query()
        ->where('role_id', '2')
        ->join('primary_addresses', 'primary_addresses.user_id', '=', 'users.id')
        ->join('secondary_addresses', 'secondary_addresses.user_id', '=', 'users.id')
        ->select('users.id', 'name', 'email', 'profile_photo_path', 'primary_addresses.city as primary_city', 'primary_addresses.street as primary_street', 'primary_addresses.postcode as primary_postcode', 'primary_addresses.country as primary_country','secondary_addresses.city as secondary_city', 'secondary_addresses.street as secondary_street', 'secondary_addresses.postcode as secondary_postcode', 'secondary_addresses.country as secondary_country')
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate($this->per_page);

        return view('livewire.dashboard-table', compact('users'));
    }

    public function updatingPagination()
    {
        $this->resetPage();
    }
}
