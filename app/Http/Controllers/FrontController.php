<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Box;
use App\BoxOrder;
use App\BoxProduct;
use App\EMail;
use App\FrontBoxes;
use App\Order;
use App\OrderBox;
use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;
use  App\Notifications\NewOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $Offerboxes = Box::where('st', 'Offer')->whereDate('end_date', '>=', Carbon::today())->get();
        $HotBoxes = Box::where('st', 'New')->whereDate('end_date', '>=', Carbon::today())->get();

        return view('Front.index', compact('Offerboxes', 'HotBoxes'));
    }
    public function boxes($id) {
        $mainbox = FrontBoxes::findOrFail($id);
        if(Session::get('Boxcounter') == null ) {
            $counter = $mainbox->views+1;
            $mainbox->update(['views'=> $counter]);
            Session::put('Boxcounter', '1');
        }
        if($mainbox) {
            if(now()->diffInSeconds(\Carbon\Carbon::parse($mainbox->endDate), false) > 0 ) {
                $boxes = Box::whereDate('end_date', '>=', Carbon::today())->whereBetween('price', [$mainbox->pricefrom, $mainbox->priceto])->where('status', 0)->get();
                return view('Front.boxes.index', compact('boxes', 'mainbox'));
            }
            else {
                return view('Front.boxes.index', compact('mainbox'));
            }
        }
        else {
            return abort(404);
        }

        // $boxes = Box::whereDate('end_date', '>=', Carbon::today())->whereBetween('price', [0, 1000])->where('status', 0)->get();
        //     return view('Front.boxes.index', compact('boxes', 'price'));
        //     $boxes = Box::whereDate('end_date', '>=', Carbon::today())->whereBetween('price', [1001, 2000])->where('status', 0)->get();
        //     return view('Front.boxes.index', compact('boxes', 'price'));


    }
    public function SelectBoxes(Request $request) {
        $requestData = $request->validate([
            'boxes' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);
        $orderRequest = $request->only(['full_name','email','phone','address','city','state']);
        $order = Order::create($orderRequest);
        foreach ($requestData['boxes'] as $key => $item) {
            $box = box::findOrFail((int)$item);
            $box->update(['purchase'=> "1"]);
            BoxOrder::create([
                'order_id' => (int)$order->id,
                'box_id' => (int)$item,
            ]);
        }
        $myuser = Admin::all();
        Notification::send($myuser, new NewOrder($order));

        return redirect()->to('/');
    }
    public function products() {
        $products = Product::all();
        return view('Front.products.index', compact('products'));
    }
    public function product($id) {
        $product = Product::findOrFail($id);
        $MayBoxes = Box::whereHas('products', function($query) use ($product){
            $query->where('product_id' , $product->id);
                     })
            ->get();
        return view('Front.product.index', compact('product', 'MayBoxes'));

    }
    public function docheckout(Request $request) {
        $data = $request->only(['full_name','email','phone','address','city','state']);
        $random = Str::random(8);
        $data['order_number'] = $random;
        $order = Order::create($data);
        foreach (session('cart') as $key => $item) {
            DB::table('box_order')->insert([
                'order_id' => $order->id,
                'box_id' => $key,
                'count' => $item['quantity']
            ]);

            // OrderBox::create([
            //     'order_id' => $order->id,
            //     'box_id' => $key,
            //     'count' => $item['quantity'],
            // ]);
        }
        Session::forget('cart');
        $myuser = Admin::all();
        Notification::send($myuser, new NewOrder($order));

        return redirect()->to('/');
    }
    public function boxshowing($uuid) {
        $box = Box::where('uuid', $uuid)->first();
        if($box != NULL) {
            $boxproduct = BoxProduct::where('box_id', $box->id)->get();
            return view('Front.boxes.boxshowing', compact('box', 'boxproduct'));
        }
        else {
            return "NO BOXES !!";
        }
    }
    public function productDetails($id) {
        $product = Product::findOrFail($id);
        return view('Front.boxes.producthowing', compact('product'));
    }
    public function addToCart($id) {
        $box = Box::find($id);
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $id => [
                     "name" => $box->name,
                     "quantity" => 1,
                     "price" => $box->price,
                     "photo" => $box->img ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "name" => $box->name,
            "quantity" => 1,
            "price" => $box->price,
            "photo" => $box->photo ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function ajaxrequest(Request $request) {
        $id = $request->id;
        $box = Box::find($id);
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $id => [
                     "name" => $box->name,
                     "quantity" => 1,
                     "price" => $box->price,
                     "photo" => $box->img ]
            ];
            session()->put('cart', $cart);
            $count = count(session('cart'));
            return response()->json($count, 200);
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            $count = count(session('cart'));
             return response()->json($count, 200);
        }
        $cart[$id] = [
            "name" => $box->name,
            "quantity" => 1,
            "price" => $box->price,
            "photo" => $box->img ];
            session()->put('cart', $cart);
            $count = count(session('cart'));
             return response()->json($count, 200);
    }
    public function RedirectionMode() {
        return "<h1 style='text-align:center;height:100vh; padding-top:200px'>
        Will Back Soon
        </h1>";
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout() {
        return view('Front.cart.checkout');
    }
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
        return view('Boxes.show', compact('box'));
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
    public function emailSend(Request $request) {
        $data = $request->only(['email']);
        EMail::create($data);
        return redirect()->to('/');
    }
}
