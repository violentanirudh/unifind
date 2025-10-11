<?php

namespace App\Livewire\Management;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public int $totalUsers = 0;
    public int $totalItems = 0;
    public int $claimedItems = 0;
    public int $unclaimedItems = 0;
    public int $lostReports = 0;
    public int $foundReports = 0;

    /**
     * Mount the component and fetch initial data.
     * This is called only once when the component is initiated.
     */
    public function mount(): void
    {
        $this->totalUsers = User::count();
        $this->totalItems = Item::count();

        // Assumption: Your 'items' table has a 'status' column.
        // Adjust 'claimed' and 'unclaimed' to match your actual status values.
        $this->claimedItems = Item::where('status', 'claimed')->count();
        $this->unclaimedItems = Item::where('status', 'deposited')->count();
        $this->lostReports = Item::where('status', 'lost')->count();
        $this->foundReports = Item::where('status', 'found')->count();
    }

    /**
     * Render the component's view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.management.dashboard')
            ->extends('layouts.management')
            ->section('content');
    }
}
