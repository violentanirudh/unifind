<?php

namespace App\Livewire\Management;

use Livewire\Component;
use App\Models\Item;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Url;

class Items extends Component
{
    use WithPagination;

    public $search;
    public $user;
    public $usersList = [];

    #[Url(as: 'page', history: true)]
    public $page;

    public function updatedUser($value)
    {
        if (strlen(trim($this->user)) < 3) return;
        $this->usersList = \App\Models\User::where('email', 'like', '%' . $this->user . '%')->limit(10)->pluck('email')->toArray();
    }

    public function updateStatus(Item $item, $userEmail)
    {
        if (!Gate::authorize('update-item', $item)) {
            session()->flash('toast', ['type' => 'error', 'message' => 'You are not authorized to update this item.']);
            $this->redirect('/management/items?page=' . $this->page, navigate: true);
        };
        $user = User::where('email', $userEmail)->first();
        if (!$user->id) {
            session()->flash('toast', ['type' => 'error', 'message' => 'Invalid claim user.']);
            $this->redirect('/management/items?page=' . $this->page, navigate: true);
        }
        $item->update(['status' => 'claimed', 'claimed_by' => $user->id, 'claimed_at' => now()]);
        session()->flash('toast', ['type' => 'success', 'message' => 'Item status updated to Claimed.']);
        $this->redirect('/management/items?page=' . $this->page, navigate: true);
    }

    public function updatedSearch() {
        if (strlen(trim($this->search)) < 3) return;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.management.items', [
            'items' => Item::whereIn('status', ['deposited', 'claimed'])
                    ->when($this->search, function($query) {
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
