<?php

namespace App\Http\Controllers;

use App\Box;
use App\BoxProduct;
use App\Collection;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $colcs = Collection::all();
        return view('Admin.Collections.index', compact('colcs'));
    }
    public function addNewProduct($id){
        $collectionProducts = Collection::find($id)->products()->orderBy('id')->paginate(10);
        $collection = Collection::find($id);
        return view('Admin.Collections.addNewProduct', compact('collection', 'collectionProducts', 'id'));
    }
    public function SaveNewProduct(Request $request, $id){
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'count' => $request->count,

        ]);
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => $product->id, 'collection_id' => $id
            )
        );
        return redirect()->back();
    }
    public function createboxes(Request $request, $id)
    {
        $type = $request->type;
        $count = 0;
        $allprice = 0;
        $collectionProducts = Collection::find($id)->products()->where('count', '>', 0)->get();
        foreach ($collectionProducts as $colpro) {
            $count = $count + number_format($colpro->count);
            $allprice = $allprice + number_format($colpro->price);
        }

        for ($i = 0; $i < $request->BoxesCount; $i++) {
            $BOXPRICE = 0;
            $box = Box::create([
                'name' => 'the?box',
                'img'=>'default.png',
                'collection_id' => $id,
                'end_date' => Carbon::now()->addMonths(2)
            ]);
            if($type == 'Randomly') {
                for ($j = 0; $j < number_format(ceil($count / $request->BoxesCount)); $j++) {
                $collectionProducts = Collection::find($id)->products()->where('count', '>', 0)->get();
                if (!$collectionProducts->isEmpty()){
                        $collectionIdProduct = $collectionProducts[rand(0, count($collectionProducts) - 1)];
                        $checkProInBox = Box::whereHas('products', function($query) use ($collectionIdProduct){
                        $query->where('product_id' , $collectionIdProduct->id);
                                 })
                        ->where('id', $box->id)
                        ->get();
                        if (!$collectionProducts->isEmpty() && $checkProInBox->isEmpty() ) {
                            $BOXPRICE = $BOXPRICE+$collectionIdProduct->price;
                            if($BOXPRICE <= $request->Max) {
                                DB::table('box_product')->insertGetId(
                                    array(
                                        'box_id' => $box->id, 'product_id' => $collectionIdProduct->id, 'created_at' => now(), 'updated_at' => now(),
                                    )
                                );
                                $collectionIdProduct->count  = $collectionIdProduct->count - 1;
                            }
                            else {
                                $BOXPRICE = $BOXPRICE-$collectionIdProduct->price;
                            }


                        }
                        Product::where('id', $collectionIdProduct->id)->update(array('count' => $collectionIdProduct->count));
                        if ($collectionIdProduct->count == 0) {
                            DB::table('collection_product')->where('id', $collectionIdProduct->id)->delete();
                        }
                    }
                }
            }

            else if($type == 'By Category') {

                $collectionProducts = Collection::find($id)->products()->get();
                $counter =  $collectionProducts->count();
                for ($j = 0; $j < $counter; $j++) {
                    $colPRo = $collectionProducts[$j];
                    $checkEmptyBox =  BoxProduct::where('box_id','=',$box->id)->first();
                    $lastOne =  DB::table('box_product')->where('box_id', $box->id)->latest('id')->first();
                    if( $checkEmptyBox== NULL && $lastOne == NULL && $colPRo->count > 0  && $BOXPRICE <= $request->Max){
                        DB::table('box_product')->insertGetId(
                            array(
                                'box_id' => $box->id, 'product_id' => $collectionProducts[$j]->id
                            )
                        );
                        Product::where('id', $colPRo->id)->update(array('count' => 0));
                    }
                    else {
                        if($colPRo->count > 0  && $BOXPRICE <= $request->Max) {
                            $lastcat = $lastOne->product_id;
                            $lastproduct = Product::find($lastcat);
                            $last_final_cat = $lastproduct->category;
                            if($colPRo->category == $last_final_cat) {
                                $BOXPRICE = $BOXPRICE+$colPRo->price;
                                if($BOXPRICE <= $request->Max) {

                                    DB::table('box_product')->insertGetId(
                                        array(
                                            'box_id' => $box->id, 'product_id' => $colPRo->id
                                        )
                                    );
                                    Product::where('id', $colPRo->id)->update(array('count' => 0));
                                }
                                else {
                                    $BOXPRICE = $BOXPRICE-$colPRo->price;
                                }


                            }
                        }


                    }

                }
            }
            else if($type == 'By Brand') {

                $collectionProducts = Collection::find($id)->products()->get();
                $counter =  $collectionProducts->count();
                for ($j = 0; $j < $counter; $j++) {
                    $colPRo = $collectionProducts[$j];
                    $checkEmptyBox =  BoxProduct::where('box_id','=',$box->id)->first();
                    $lastOne =  DB::table('box_product')->where('box_id', $box->id)->latest('id')->first();
                    if( $checkEmptyBox== NULL && $lastOne == NULL && $colPRo->count > 0  && $BOXPRICE <= $request->Max){
                        DB::table('box_product')->insertGetId(
                            array(
                                'box_id' => $box->id, 'product_id' => $collectionProducts[$j]->id
                            )
                        );
                        Product::where('id', $colPRo->id)->update(array('count' => 0));
                        $BOXPRICE = $BOXPRICE+$colPRo->price;
                    }
                    else {
                        if($colPRo->count > 0  && $BOXPRICE <= $request->Max) {
                            $lastcat = $lastOne->product_id;
                            $lastproduct = Product::find($lastcat);
                            $last_final_cat = $lastproduct->brand;
                            if($colPRo->brand == $last_final_cat) {
                                DB::table('box_product')->insertGetId(
                                    array(
                                        'box_id' => $box->id, 'product_id' => $colPRo->id
                                    )
                                );
                                Product::where('id', $colPRo->id)->update(array('count' => 0));
                                $BOXPRICE = $BOXPRICE+$colPRo->price;
                            }
                        }


                    }

                }
            }
            $mybox = Box::where('id', $box->id)->update(['price' => $BOXPRICE]);

        //////////////////
        // if($type == 'By Category') {
        //     $collectionProducts = Collection::find($id)->products()->get();
        //     $counter =  DB::table('collection_product')->count();
        //     for ($j = 0; $j < $counter; $j++) {
        //         $mycount = $collectionProducts[$j]->count;
        //         if ($mycount > 0){
        //             $colPRo = $collectionProducts[$j];
        //             $checkProInBox = Box::whereHas('products', function($query) use ($colPRo){
        //                 $query->where('product_id' , $colPRo->id);
        //                 })
        //                 ->where('id', $box->id)
        //                 ->get();
        //                 $lastOne =  DB::table('box_product')->where('id', $i)->latest('id')->first();
        //                 dd($lastOne);
        //                 if( $checkProInBox->isEmpty() && $lastOne == NULL){
        //                     DB::table('box_product')->insertGetId(
        //                         array(
        //                             'box_id' => $box->id, 'product_id' => $collectionProducts[$j]->id
        //                         )
        //                     );
        //                     Product::where('id', $collectionProducts[$j]->id)->update(array('count' => 0));

        //                 }
        //                 else {
        //                     $lastOne =  DB::table('box_product')->latest('id')->first();
        //                     $lastcat = $lastOne->product_id;
        //                     $lastproduct = Product::find($lastcat);
        //                     $last_final_cat = $lastproduct->category;
        //                     $colPRo = $collectionProducts[$j];
        //                     $checkProInBox = Box::whereHas('products', function($query) use ($colPRo){
        //                         $query->where('product_id' , $colPRo->id);
        //                                 })
        //                         ->where('id', $box->id)
        //                         ->get();

        //                     if($collectionProducts[$j]->category == $last_final_cat && $checkProInBox->isEmpty() && $collectionProducts[$j]->count != 0) {
        //                         DB::table('box_product')->insertGetId(
        //                             array(
        //                                 'box_id' => $box->id, 'product_id' => $collectionProducts[$j]->id, 'created_at' => now(), 'updated_at' => now(),
        //                             )
        //                         );
        //                         Product::where('id', $collectionProducts[$j]->id)->update(array('count' => 0));
        //                 }

        //             }
        //         }
        //     }
        // }
    }

        return redirect()->route('admin.boxes.index');
    }

    public function DeleteProduct($id) {
        DB::table('collection_product')->where('id',  $id)->delete();
        session()->flash('success', 'Product Deleted Successfully');
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
