<?php

namespace App\Http\Controllers;

use App\FrontBoxes;
use Illuminate\Http\Request;
use App\Traits\StoreImageTrait;
class MainBoxesController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = FrontBoxes::all();
        return view('Admin.MainBoxes.index', compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.MainBoxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name_en', 'name_ar','pricefrom', 'priceto' ,'desc', 'endDate' ,'status']);
        if ($this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'mainboxes') != null)
        $data['img'] = $this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'mainboxes');
        FrontBoxes::create($data);
        session()->flash('success', 'Main Box Created Successfully');
        return redirect()->route('admin.mainboxes.index');
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
        $box = FrontBoxes::findOrFail($id);
        return view('Admin.MainBoxes.edit', compact('box'));
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
        $data = $request->only(['name_en', 'name_ar','pricefrom', 'priceto' ,'desc', 'endDate' ,'status']);
        if ($this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'mainboxes') != null)
        $data['img'] = $this->verifyAndStoreImage($request, $fieldname = 'img', $directory = 'mainboxes');
        $box = FrontBoxes::findOrFail($id)->update($data);
        session()->flash('success', 'Main Box Updated Successfully');
        return redirect()->route('admin.mainboxes.index');
    }
    public function UpdateStatus(Request $request) {
        $box = FrontBoxes::findOrFail($request->id);
        if($box->status == 0) $box->update(array('status' => 1));
        elseif($box->status == 1) $box->update(array('status' => 0));
        return response(['data' => $box->status]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $box = FrontBoxes::findOrFail($id);
        $box->delete();
        session()->flash('success', 'Main Box Deleted Successfully');
        return redirect()->back();
    }
}
