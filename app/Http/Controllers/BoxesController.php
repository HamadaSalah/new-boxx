<?php

namespace App\Http\Controllers;

use App\Box;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Storage;

class BoxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setlocale(LC_TIME, 'es_ES.utf8');
        Carbon::setLocale('en');
        $boxes = Box::all();
        return view('Admin.Boxes.index', compact('boxes'));
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
        $box = Box::find($id);
        return view('Admin.Boxes.show', compact('box'));
    }
    public function QrCode($id)
    {


        $box = Box::where('uuid', $id)->first();
        $boxID = $box->uuid;
        $image = \QrCode::format('png')->merge(public_path('logo.png'), 0.4, true)
            ->size(500)->errorCorrection('H')->color(5, 179, 227)
            ->gradient(100, 100, 201, 48, 48, 51, 'vertical')
            ->generate('http://mystery.test/boxshowing/' . $boxID);
        // $output_file = '/qr-code/img-' . time() . '.png';
        // Storage::disk('local')->put($output_file, $image); //storage/app/public/img/qr-code/img-1557309130.png

        // return response($image)->header('Content-type', 'image/png');
        return view('Boxes.qrcode', compact('boxID'));
    }
    public function boxdeleting($bid, $pid)
    {
        $pro = DB::table('box_product')->where('box_id', '=', $bid)->where('product_id', '=', $pid)->delete();
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $box = Box::findOrFail($id);
        return view('Admin.Boxes.edit', compact('box'));
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
        $request_data = $request->except(['img', '_token', '_method']);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = 'box_image' . '_' . time() . '.' . $ext;
            $file->storeAs('public/img/boxes', $filename);
            $request_data['img'] = $filename;
        }
        $admin = Box::where('id', $id)->update($request_data);
        session()->flash('success', 'Updated succcessFully');
        return redirect()->route('admin.boxes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $box = Box::findOrFail($id);
        $box->delete();
        return redirect()->back();
    }
    public function UpdateStatus(Request $request)
    {
        $box = Box::findOrFail($request->id);
        if ($box->status == 0) $box->update(array('status' => 1));
        elseif ($box->status == 1) $box->update(array('status' => 0));
        return response(['data' => $request->all()]);
    }
}
