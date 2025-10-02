<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class Item extends Component
{
    public $item;

    public function delete()
    {
        if (Gate::allows('delete-item', $this->item)) {
            $this->item->delete();
            session()->flash('toast', ['type' => 'success', 'message' => 'Item deleted successfully.']);
        } else {
            session()->flash('toast', ['type' => 'error', 'message' => 'You are not authorized to delete this item.']);
        }
        $this->redirect('/dashboard', navigate: true);
    }

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
