<?php

namespace App\Livewire;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function mount($item)
    {
        $this->item = \App\Models\Item::where('code', $item)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.item')
            ->extends('layouts.app')
            ->section('content');
    }
}
