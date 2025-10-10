<?php

namespace App\Livewire\Management;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Gate;

class Feeds extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search;

    public function updatedSearch() {
        if (strlen(trim($this->search)) < 3) return;
        $this->resetPage();
    }

    public function approve(Item $item) {
        if (Gate::authorize('update-item', $item));
        // dd($item);
        $item->update(['is_visible' => true]);
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.management.feeds', [
            'items' => Item::when($this->search, function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                        $query->orWhere('code', 'like', '%' . strtoupper($this->search) . '%');
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(20)
        ])
            ->extends('layouts.management')
            ->section('content');
    }
}
