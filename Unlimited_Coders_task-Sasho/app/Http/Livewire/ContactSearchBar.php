<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ContactSearchBar extends Component
{
    public $query;
    public $users;
    public $highlightIndex = 0;

    public function mount()
    {
        $this->resetSearch();
    }

    public function resetSearch()
    {
        $this->query = '';
        $this->users = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->users) - 1) 
        {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) 
        {
            $this->highlightIndex = count($this->users) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $user = $this->users[$this->highlightIndex] ?? null;
        if ($user) {
            $this->redirect(route('users.show', $user['id']));
        }
    }

    public function updatedQuery()
    {
        sleep(1);
        $this->users = User::query()
        ->where('role_id', '2')
        ->where('name', 'like', '%' . $this->query . '%')
        ->orderBy('name', 'asc')
        ->get();
    }


    public function render()
    {
        return view('livewire.contact-search-bar');
    }
}
