<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;

class SignUp extends Component
{

    #[Rule('required|string|max:255')]
    public $name = '';

    #[Rule('required|email|unique:users,email')]
    public $email = '';

    #[Rule('required|string|min:8')]
    public $password = '';

    public function submit()
    {
        $this->validate();

        $user = \App\Models\User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if (!$user) {
            session()->flash('toast', ['type' => 'error', 'message' => 'There was an error creating the user.']);
            return;
        }

        session()->flash('toast', ['type' => 'success', 'message' => 'User successfully registered.']);
        $this->redirect('/signin', navigate: true);
    }

    public function render()
    {
        return view('livewire.sign-up')
            ->extends('layouts.app')
            ->section('content');
    }
}
