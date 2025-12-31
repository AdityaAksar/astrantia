<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Assignment;
use Livewire\WithPagination;
use Carbon\Carbon;

class AssignmentList extends Component
{
    use WithPagination;
    public $search = '';
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $query = Assignment::query();
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('course', 'like', '%' . $this->search . '%');
            });
        }
        $driver = config('database.default');
        if ($driver === 'sqlite') {
            $query->orderByRaw("CASE WHEN deadline >= datetime('now', 'localtime') THEN 0 ELSE 1 END ASC")
                ->orderBy('deadline', 'asc');
        } else {
            $query->orderByRaw("CASE WHEN deadline >= NOW() THEN 0 ELSE 1 END ASC")
                ->orderBy('deadline', 'asc');
        }

        return view('livewire.assignment-list', [
            'assignments' => $query->paginate(9)
        ]);
    }
}