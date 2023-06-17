@extends('Front.master')
@section('content')

<div class="wrapper">
 <div class="container">
   <div class="row">
    <div class="col-md-12 single-product">
            <div class="col-md-12 pro-details" style="float: left">
                <h2>Product Details</h2>
                <div class="clearfix"></div>
                <img src="{{asset('storage/products/adidas.png')}}" alt="">
                <p>{{$product->name}}</p>
                <p>{{$product->price}}$</p>
            </div>
            <div class="col-md-12 single-product-right" style="float: right">
                <h2>Box May Contain This Product</h2>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="themain" style="width: 100%">
                        <div class="sliderSlickerr2">
                            @foreach ($MayBoxes as $box)
                            <div class=" may-boxes">
                                <img src="{{asset('storage/img/boxes/default.png')}}" alt="">
                                <p>{{$box->name}}</p>
                                <p>{{$box->price}}$</p>
                                <button class="btn opennow OrderNow" value="{{$box->id}}">ADD TO CART</button>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
 </div>
</div>
@endsection
