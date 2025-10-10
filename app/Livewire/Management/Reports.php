<?php

namespace App\Livewire\Management;

use Livewire\Component;

class Reports extends Component
{
    public function render()
    {
        return view('livewire.management.reports')
            ->extends('layouts.management')
            ->section('content');
    }
}
