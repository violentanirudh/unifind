<?php

namespace App\Livewire\Management;

use Livewire\Component;

class Items extends Component
{
    public function render()
    {
        return view('livewire.management.items')
            ->extends('layouts.management')
            ->section('content');
    }
}
