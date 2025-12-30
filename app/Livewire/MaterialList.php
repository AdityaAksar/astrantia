<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithPagination;

class MaterialList extends Component
{
    use WithPagination;
    public $search = '';
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $query = Material::latest();
        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('subject', 'like', '%' . $this->search . '%');
            });
        }
        return view('livewire.material-list', [
            'materials' => $query->paginate(9)
        ]);
    }
}