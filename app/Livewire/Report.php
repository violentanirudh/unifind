<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Report extends Component
{
    use WithFileUploads;

    #[Rule('required|string|max:255')]
    public $name = '';

    #[Rule('required|string|max:2000')]
    public $description = '';

    #[Rule('nullable|image|max:1024')]
    public $image;

    public function submit()
    {
        $this->validate();

        $report = [
            'reported_by' => auth()->id(),
            'code'        => strtoupper(\Str::random(6)),
            'name'        => $this->name,
            'description' => $this->description,
        ];

        if ($this->image) {
            $path = $this->image->store('images', 'public');
            $report->image_path = asset('storage/' . $path);
        }


        $report = \App\Models\Item::create($report);

        if (!$report) {
            session()->flash('toast', ['type' => 'error', 'message' => 'There was an error submitting the report.']);
            return;
        }

        session()->flash('toast', ['type' => 'success', 'message' => 'Report successfully submitted.']);
        $this->reset(['name', 'description']);
    }

    public function render()
    {
        return view('livewire.report')
            ->extends('layouts.app')
            ->section('content');
    }
}
