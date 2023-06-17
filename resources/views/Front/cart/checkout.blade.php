@extends('Front.master')
@section('content')

<div class="wrapper">
    <div class="container">
        <h1 class="cartpagehead">Checkout Page</h1>
        @if (session('cart'))

        <div class="checkout">
            <form action="{{route('docheckout')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <i class="fa fa-user"> </i> <label for="exampleFormControlInput1" class="form-label" > Full Name</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name...." name="full_name"  required>
                </div>
                <div class="mb-3">
                    <i class="fa fa-envelope-open-text"> </i> <label for="exampleFormControlInput1" class="form-label"> Email</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email...." name="email" required>
                </div>
                <div class="mb-3">
                    <i class="fa fa-envelope-open-text"> </i> <label for="exampleFormControlInput1" class="form-label"> Phone</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone...." name="phone" required>
                </div>
                <div class="mb-3">
                    <i class="fa fa-address-card"> </i> <label for="exampleFormControlInput1" class="form-label"> Address</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address...." name="address" required>
                </div>
                <div class="mb-3">
                    <i class="fa fa-city"> </i> <label for="exampleFormControlInput1" class="form-label"> City</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City...." name="city" required>
                </div>
                <div class="mb-3">
                    <i class="fa fa-university"> </i> <label for="exampleFormControlInput1" class="form-label"> State</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="State...." name="state" required>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" style="width: 100%" type="submit">ORDER NOW</button>
                </div>
            </form>

    </div>
        @else
            <p style="text-align: center;margin:auto;color:#FFF;padding-bottom:50px">No Items In Cart To Checkout</p>
        @endif
    </div>
</div>
@endsection
