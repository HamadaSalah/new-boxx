<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Traits\StoreImageTrait;

class SettingsController extends Controller
{
    use StoreImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        return view('Admin.settings.index', compact('settings'));
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
        $settings = Setting::first();
        return view('Admin.settings.edit', compact('settings'));
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
        $settings = Setting::findOrFail($id);
        $data = $request->all();
        if($request->WebsiteStatus == 'on') {
            $data['WebsiteStatus'] = 0;
        }
        else {
            $data['WebsiteStatus'] = 1;
        }
        if ($request->hasFile('BoxImg')) {
            $file = $request->file('BoxImg');
            $ext = $file->getClientOriginalExtension();
            $filename = 'BoxImg' . '.' . $ext;
            $file->storeAs('public/BoxImg', $filename);
            $data['BoxImg'] = $filename;
        }
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = 'logo' . '.' . $ext;
            $file->storeAs('public/logo', $filename);
            $data['logo'] = $filename;
        }


        $settings->update($data);
        return redirect()->route('admin.settings.index');

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
