<?php

namespace App\Livewire\Management;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Gate;

class Users extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public function updatedSearch() {
        if (strlen(trim($this->search)) < 3) return;
        $this->resetPage();
    }

    public function updateRole(User $user, $role) {
        if ($user->role === 'admin') {
            session()->flash('toast', ['type' => 'error', 'message' => 'You cannot change admin role.']);
            return;
        }
        if (!auth()->user()->isAdmin() && in_array($role, ['user', 'moderator'])) {
            session()->flash('toast', ['type' => 'error', 'message' => 'Unauthorized action.']);
            return;
        }
        $user->role = $role;
        $user->save();
        session()->flash('toast', ['type' => 'success', 'message' => 'User role updated successfully.']);
    }

    public function render()
    {
        return view('livewire.management.users', [
            'users' => User::when($this->search, function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                        $query->orWhere('email', 'like', '%', $this->search . '%');
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(10)
        ])
            ->extends('layouts.management')
            ->section('content');
    }
}
