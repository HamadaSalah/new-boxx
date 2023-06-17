@extends('Front.master')
@section('content')
<div class="wrapper">
    <div class="container">
        <h1 class="cartpagehead">Cart Page</h1>
        <div class="row">
            <div class="clearfix"></div>
            @if (session('cart'))
            <?php $total=0 ?>
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">Img</th>
                      <th scope="col">Box Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Count</th>
                      <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $item)
                    <?php $total= $total + ($item['price']*$item['quantity']) ?>
                    <tr>
                        <td><img src="{{asset('storage/img/boxes/'.$item['photo'])}}" style="width: 70px" alt=""></td>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['quantity']}}</td>
                        <td><i class="fas fa-times"></i></td>
                      </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total: {{$total}} $</td>
                        <td> <a href="{{route('checkout')}}"><button class="btn btn-outline-success">Checkout Now</button></a> </td>
                    </tr>
                </tbody>
              </table>
              <p></p>

            @else
             <p style="text-align: center;margin:auto;color:#FFF;padding-bottom:50px">No Item In the Cart</p>
            @endif
        </div>
    </div>
</div>
@endsection
