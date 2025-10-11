<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $items = \App\Models\Item::where('reported_by', auth()->id())->get();
        return view('livewire.dashboard', compact('items'))
            ->extends('layouts.app')
            ->section('content');
    }
}
