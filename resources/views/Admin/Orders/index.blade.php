
@extends('Admin.master')
@section('content')
<h2 class="collectioName">All Orders</h2>
<div class="clearfix"></div>
<div class="table-responsive">
    @if ($orders->count() > 0)
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Order Number</th>
                <th class="border-top-0">Email</th>
                <th class="border-top-0">Time</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $key => $order)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$order->order_number}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->created_at->diffForHumans()}}</td>
                <td>
                    <form style="display: inline;" action="{{route('admin.orders.destroy', $order->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{Route('admin.orders.show', $order->id)}} ">
                        <button class="btn btn-primary"><i class="fa fa-eye"></i>show</button>
                    </a>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>

    @else
    <p style="text-align: center">No Order</p>
    @endif
</div>



@endsection
