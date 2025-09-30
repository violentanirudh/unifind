<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\Gate;

class Dashboard extends Component
{
    public $user;
    public $items;
    public $search;

    public function delete(Item $item)
    {
        Gate::authorize('delete-item', $item);
        $item->delete();
        session()->flash('toast', ['type' => 'success', 'message' => 'Item deleted successfully.']);
        $this->mount();
    }

    public function mount()
    {
        $this->user = auth()->user();

        if (!$this->user) {
            $this->redirect('/signin', navigate: true);
            return;
        }

        $this->items = \App\Models\Item::where('is_visible', false)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function updatedSearch()
    {
        $this->items = \App\Models\Item::where('is_visible', false)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard')
            ->extends('layouts.app')
            ->section('content');
    }
}
