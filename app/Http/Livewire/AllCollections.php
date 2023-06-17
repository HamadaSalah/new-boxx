<?php

namespace App\Http\Livewire;
use App\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class AllCollections extends Component
{

    protected $listeners = ['addNewCol' => '$refresh'];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function deleteData($id)
    {
        $education = Collection::find($id);
        $education->delete();
        session()->flash('message', 'Collection Deleted Successfully');
    }

    public function render()
    {
        $colcs = Collection::latest()->paginate(5);
        return view('livewire.all-collections', compact('colcs'));
    }
}
