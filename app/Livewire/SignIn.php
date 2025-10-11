<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

class SignIn extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required|min:8')]
    public $password;

    public function submit()
    {
        $this->validate();

        Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if (!Auth::check()) {
            session()->flash('toast', ['type' => 'error', 'message' => 'Invalid credentials. Please try again.']);
            return redirect()->back();
        }

        Auth::login(Auth::user(), true);
        $this->redirect('/feeds', navigate: true);
    }

    public function render()
    {
        return view('livewire.sign-in')
            ->extends('layouts.app')
            ->section('content');
    }
}
