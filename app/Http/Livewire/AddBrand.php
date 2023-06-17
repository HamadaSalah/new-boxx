<?php

namespace App\Http\Livewire;

use App\Brand;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddBrand extends Component
{
    public $data = [];
    public function AddCol()
    {
        $this->dispatchBrowserEvent('');
        $validateData = Validator::make($this->data, [
            'name' => 'required',
        ])->validate();
        $chapter = Brand::create($this->data);
        session()->flash('message', 'Brand Added Successfully');
        $this->emit('addNewCol');
        $this->data = [];
    }

    public function render()
    {
        return view('livewire.add-brand');
    }
}
