@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Box Name</h2>

<div class="clear"></div>

<div class="table-responsive">
    <table class="table user-table no-wrap">
        <thead>
        <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product img</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($box->products as $item)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a data-fancybox="gallery" href="{{asset('storage/products/'.$item->img)}}"> <img src="{{asset('storage/products/'.$item->img)}}" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></a>
                </td>
                <td>
                    <form style="display: inline;" action="{{route('admin.boxdeleting', [$box->id, $item->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>




@endsection
