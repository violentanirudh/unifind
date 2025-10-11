<?php

namespace App\Livewire\Management;

use App\Models\Reward;
use Livewire\Component;
use Livewire\WithPagination;

class Rewards extends Component
{
    use WithPagination;

    // Form properties with type-hinting
    public string $title = '';
    public string $description = '';
    public int|string $points_required = '';

    /**
     * Define the validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'points_required' => 'required|integer|min:0',
        ];
    }

    /**
     * Store a new reward in the database.
     *
     * @return void
     */
    public function store(): void
    {
        // Validate the form input
        $validatedData = $this->validate();

        // Create the reward
        Reward::create($validatedData);

        // Flash a success message
        session()->flash('status', 'Reward successfully created.');

        // Reset the form fields
        $this->reset(['title', 'description', 'points_required']);
    }

    /**
     * Delete a reward from the database.
     *
     * @param Reward $reward
     * @return void
     */
    public function delete(Reward $reward): void
    {
        $reward->delete();
        session()->flash('status', 'Reward successfully deleted.');
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Fetch paginated rewards
        $rewards = Reward::latest()->paginate(10);

        return view('livewire.management.rewards', [
            'rewards' => $rewards,
        ])
            ->extends('layouts.management')
            ->section('content');
    }
}
