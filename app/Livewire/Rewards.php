<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reward;

class Rewards extends Component
{

    public $rewards;

    public function mount()
    {
        $this->rewards = Reward::all();
    }

    public function render()
    {
        return view('livewire.rewards')
            ->extends('layouts.app')
            ->section('content');
    }
}
