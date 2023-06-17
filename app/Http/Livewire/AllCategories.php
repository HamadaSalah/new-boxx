<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AllCategories extends Component
{

    protected $listeners = ['addNewCol' => '$refresh'];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::latest()->paginate(5);
        return view('livewire.all-categories', compact('categories'));
    }
}
