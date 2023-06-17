
@extends('Admin.master')
@section('content')
{{-- @dd($orderDetails) --}}
<h2 class="collectioName">Orders : {{$order->order_number}}</h2>
<div class="clearfix"></div>
<div class="table-responsive">
    <div class="table-responsive">
        <table class="table OrdersTable">
            <tbody><tr>
                <th>Order Number</th>
                <td>{{$order->order_number}}</td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td>{{$order->full_name}}</td>
            </tr>
            <tr>
                <th>email</th>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$order->address}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$order->city}}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{$order->state}}</td>
            </tr>
            <tr>
                <th>Order Details</th>
                <td>
                    @foreach ($orderDetails as $myorder)
                        Box Name : <a href="{{route('admin.boxes.show', $myorder->box->id)}}" target="_blank">{{$myorder->box->name}}</a>
                    <br/>
                    @endforeach
                </td>
            </tr>
        </tbody></table>
    </div></div>



@endsection
