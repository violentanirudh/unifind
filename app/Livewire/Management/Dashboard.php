<?php

namespace App\Livewire\Management;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.management.dashboard')
            ->extends('layouts.management')
            ->section('content');
    }
}
