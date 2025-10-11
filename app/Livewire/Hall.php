<?php

namespace App\Livewire;

use Livewire\Component;

class Hall extends Component
{
    public function render()
    {
        // Top users by points
        $users = \App\Models\User::where('points', '>', 0)->orderBy('points', 'desc')
            ->take(10)->get();

        return view('livewire.hall', compact('users'))
            ->extends('layouts.app')
            ->section('content');
    }
}
