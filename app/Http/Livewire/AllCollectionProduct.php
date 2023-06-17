<?php

namespace App\Http\Livewire;

use App\Brand;
use App\Category;
use App\Collection;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AllCollectionProduct extends Component
{

    public $data = [];
    public $colID;
    public $myid;
    public function mount($id)
    {
        $this->colID = $id;
        $this->myid = $id;
    }
    public function AddProductCollection()
    {
        $this->dispatchBrowserEvent('');
        $validateData = Validator::make($this->data, [
            'name' => 'required',
            'price' => 'required',
            'count' => 'required'
        ])->validate();

        $product = Product::create([
            'name' => $this->data['name'],
            'price' => $this->data['price'],
            'count' => $this->data['count'],
        ]);
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => $product->id, 'collection_id' => $this->colID
            )
        );


        session()->flash('message', 'Product Added Successfully');
        $this->emit('addNewColproduct');
        $this->data = [];
    }

    public function render()
    {
        // dd($this->myid);
        $myid = $this->myid;
        $categorys = Category::all();
        $brands = Brand::all();
        return view('livewire.all-collection-product', compact('categorys', 'brands', 'myid'));
    }
}
