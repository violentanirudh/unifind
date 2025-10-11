<?php

namespace App\Livewire\Management;

use Livewire\Component;
use App\Models\Item;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Url;

class Feeds extends Component
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

    public function updatedSearch()
    {
        if (strlen(trim($this->search)) < 3) return;
        $this->resetPage();
    }

    public function updateStatus(Item $item, $userEmail)
    {
        if (!Gate::authorize('update-item', $item)) {
            session()->flash('toast', ['type' => 'error', 'message' => 'You are not authorized to update this item.']);
            $this->redirect('/management/feeds?page=' . $this->page, navigate: true);
        };
        $user = User::where('email', $userEmail)->first();
        if ($user->id === $item->reported_by && $item->status !== 'lost') {
            session()->flash('toast', ['type' => 'error', 'message' => 'Invalid deposit user.']);
            $this->redirect('/management/feeds?page=' . $this->page, navigate: true);
        }
        $user->increment('points', intval($item->points));
        $item->update(['status' => 'deposited', 'deposited_by' => $user->id]);
        session()->flash('toast', ['type' => 'success', 'message' => 'Item status updated to Deposited.']);
        $this->redirect('/management/feeds?page=' . $this->page, navigate: true);
    }

    public function delete(Item $item)
    {
        Gate::authorize('delete-item', $item);
        $item->delete();
        session()->flash('toast', ['type' => 'success', 'message' => 'Item deleted successfully.']);
        $this->redirect('/management/feeds?page=' . $this->page, navigate: true);
    }

    public function approve(Item $item, $points)
    {
        if (Gate::authorize('update-item', $item));
        $item->update(['is_visible' => !($item->is_visible), 'points' => $points]);
        $this->redirect('/management/feeds?page=' . $this->page, navigate: true);
    }

    public function render()
    {
        $items = Item::whereIn('status', ['lost', 'found'])
                    ->when($this->search, function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                        $query->orWhere('code', 'like', '%' . strtoupper($this->search) . '%');
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        $this->page = $this->page ?? 1;
        return view('livewire.management.feeds', compact('items'))
            ->extends('layouts.management')
            ->section('content');
    }
}
