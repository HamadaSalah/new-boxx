<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;
use App\Traits\StoreImageTrait;

class ProductsController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.products.index');
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
        $categs = Category::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $product = Product::findOrFail($id);
        return view('Admin.products.edit', compact('product', 'categs', 'brands', 'suppliers'));
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
        $request_data  =  $request->only('name', 'price', 'img', 'supp_id', 'category', 'brand', 'details', 'video');
        $product = Product::find($id);
        if ($request->hasFile('img' ))
            $request_data['img'] = $this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'products');
        if ($request->hasFile('video' ))
            $request_data['video'] = $this->verifyAndStoreImage($request, $fieldname = 'video', $directory = 'products');
        $product->fill($request_data)->save();
        session()->flash('success', 'Product Updated Successfully');
        return redirect()->route('admin.products.index');
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
    public function upload_ck_image(Request $request) {
            if($request->hasFile('upload')) {
                //get filename with extension
                $filenamewithextension = $request->file('upload')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('upload')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename.'_'.time().'.'.$extension;

                //Upload File
                $request->file('upload')->storeAs('public/uploads', $filenametostore);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('storage/uploads/'.$filenametostore);
                $msg = 'Image successfully uploaded';
                $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

                // Render HTML output
                @header('Content-type: text/html; charset=utf-8');
                echo $re;
    }
    }
}
