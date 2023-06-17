@extends('Front.master')
@section('content')
<div class="wrapper">
    <div class="container productinfo">
        <div class="row">
            <div class="col-md-6 all-box-show">
                <img src="{{asset('storage/products/'.$product->img)}}" alt="" style="width: 100%" class="pro_img">
            </div>
            <div class="col-md-6" style="margin-top: 80px">
                <h1 class="p_details">Name : {{$product->name}}</h1>
                <h1 class="p_details">price : {{$product->price}}</h1>
                <h1 class="p_details">Supplier Social Media :</h1>
                @if ($product->supplier)
                <div class="socialize col-12">
                <a href="{{$product->supplier->facebook}}" target="_blank"><i class="fab fa-facebook socialIcon"> </i></a>
                <a href="{{$product->supplier->twitter}}" target="_blank"><i class="fab fa-twitter socialIcon"> </i></a>
                <a href="{{$product->supplier->instagram}}" target="_blank"><i class="fab fa-instagram socialIcon"> </i></a>
                <a href="{{$product->supplier->youtube}}" target="_blank"><i class="fab fa-youtube socialIcon"> </i></a>
                </div>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 pro_det">
                <hr>
                {!!$product->details!!}
                @if ($product->video != NULL)
                <video width="100%" controls>
                    <source src="{{asset('storage/products/'.$product->video)}}" type="video/mp4">
                    Your browser does not support HTML video.
                  </video>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
