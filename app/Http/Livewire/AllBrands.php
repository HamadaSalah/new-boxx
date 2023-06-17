<?php

namespace App\Http\Livewire;

use App\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class AllBrands extends Component
{
    protected $listeners = ['addNewCol' => '$refresh'];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $brands = Brand::latest('id')->paginate(5);
        return view('livewire.all-brands', compact('brands'));
    }
}
