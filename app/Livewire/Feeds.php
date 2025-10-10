<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Gate;

class Feeds extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $user;
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
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.feeds', [
            'items' => Item::where('is_visible', false)
                    ->when($this->search, function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                        $query->orWhere('code', 'like', '%' . strtoupper($this->search) . '%');
                    })
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(10)
        ])
        ->extends('layouts.app')
        ->section('content');
    }
}
