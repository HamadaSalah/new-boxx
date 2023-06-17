<div>
    @if ($products->count() == 0)
    <div style="display: block; clear: both;text-align: center">
        <p>No Products Founded Please Add Products 🤗</p>
    </div>
    @else
        <div class="table table-hover table-striped">
    <table class="table table-hover table-striped " id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Product Name</th>
                <th class="border-top-0">Img</th>
                <th class="border-top-0">price</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=> $col)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$col->name}}</td>
                <td>
                    <a data-fancybox="gallery" href="{{asset('storage/products/'.$col->img)}}"> <img src="{{asset('storage/products/'.$col->img)}}" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></a>
                </td>
                <td>{{$col->price}}</td>
                <td><a href="{{route('admin.products.edit', $col->id)}}">
                    <button class="btn btn-success">Edit</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
    </div>

    @endif

</div>
