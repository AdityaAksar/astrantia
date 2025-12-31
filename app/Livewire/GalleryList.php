<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;
use Livewire\WithPagination;

class GalleryList extends Component
{
    use WithPagination;
    public $search = '';
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $query = Gallery::query();
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        return view('livewire.gallery-list', [
            'galleries' => $query->latest()->paginate(12)
        ]);
    }
}