<?php

namespace App\Http\Livewire;

use App\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class AddCollection extends Component
{
    public $data = [];
    public function AddCol()
    {
        $this->dispatchBrowserEvent('');
        $validateData = Validator::make($this->data, [
            'name' => 'required',
        ])->validate();
        $chapter = Collection::create($this->data);
        session()->flash('message', 'Collection Added Successfully');
        $this->emit('addNewCol');
        $this->data = [];
    }

    public function render()
    {
        return view('livewire.add-collection');
    }
}
