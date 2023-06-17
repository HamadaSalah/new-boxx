<?php

namespace App\Http\Livewire;

use App\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AllProducts extends Component
{

    public $collectionID;
    public $MyCollection;
    use WithPagination;
    protected $listeners = ['addNewColproduct' => '$refresh'];
    protected $paginationTheme = 'bootstrap';
    public function mount($collection)
    {
        $this->collectionID = $collection;
    }
    public function render()
    {


        $this->MyCollection = Collection::find($this->collectionID)->products()->get();
        return view('livewire.all-products', [
            'collections' => $this->MyCollection
        ]);
    }
}
