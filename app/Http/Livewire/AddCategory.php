<?php

namespace App\Http\Livewire;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddCategory extends Component
{
    public $data = [];
    public function AddCol()
    {
        $this->dispatchBrowserEvent('');
        $validateData = Validator::make($this->data, [
            'name' => 'required',
        ])->validate();
        $chapter = Category::create($this->data);
        session()->flash('message', 'Category Added Successfully');
        $this->emit('addNewCol');
        $this->data = [];
    }


    public function render()
    {
        return view('livewire.add-category');
    }
}
