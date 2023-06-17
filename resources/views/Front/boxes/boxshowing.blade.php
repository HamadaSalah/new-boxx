@extends('Front.master')
@section('content')
<div class="wrapper">
    <div class="container">
        <h1 class="cartpagehead">{{$box->name}} Contain This Products</h1>
        <div class="row">
            @foreach ($boxproduct as $item)
            <div class="col-md-4">
                <div class="boxshow">
                    <div class="headline">
                        <div class="top-line">
                            <a href="{{route('productDetails',$item->product->id)}}">
                                <button class="btn btn-success" style="background: #32b0b3;">Show Product <i class="fas fa-arrow-circle-right"></i></button></div>
                            </a>
                            {{-- <div class="mid-line"></div>
                        <div class="bot-line">View</div> --}}
                      </div>

                    <img src="{{asset('storage/products/'.$item->product->img)}}" alt="">
                    <p>{{$item->product->name}}</p>
                    <span class="pricespan">{{$item->product->price}} $</span>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
            {{-- <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Img</th>
                    <th scope="col">Price</th>
                    <th scope="col">Show</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($boxproduct as $item)
                    <tr>
                        <td>{{$item->product->name}}</td>
                        <td><img src="{{asset('storage/products/'.$item->product->img)}}" style="width: 70px" alt=""></td>
                        <td>{{$item->product->price}} $</td>
                        <td>
                            <a href="{{route('productDetails',$item->product->id)}}">
                                <button class="btn btn-primary" style="background: #a4e620;border-color:#a4e620">Show <i class="fas fa-eye"></i></button>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
              </table> --}}
              <p></p>
        </div>
    </div>
</div>
@endsection
