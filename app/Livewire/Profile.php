<?php

namespace App\Livewire;

use App\Models\User;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $user;

    #[Rule('required|string|min:8|confirmed')]
    public $password;
    public $password_confirmation;

    public function savePassword()
    {
        $this->validate();

        $this->user->password = Hash::make($this->password);
        $this->user->save();

        session()->flash('message', 'Password updated successfully.');
        $this->reset(['password', 'password_confirmation']);
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.profile')
            ->extends('layouts.app')
            ->section('content');
    }
}
