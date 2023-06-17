@extends('Front.master')
@section('content')
<div class="wrapper">
 <div class="container">
   <div class="row">
    <h1 class="wp_head">@lang('site.OpenMysteryBoxes') <span>@lang('site.Online')</span></h1>
     <div class="clearfix"></div>
     @foreach ($products as $product)
     <div class="col-md-3 col-6">
        <div class="product">
            <a href="{{Route('product', $product->id)}}">
            <img src="{{asset('storage/products/adidas.png')}}" alt="">
            <p>{{$product->name}}</p>
            <p><span>{{$product->price}}$</span> </p>
        </a>
        </div>
     </div>
     @endforeach

    </div>
 </div>
</div>
@endsection
