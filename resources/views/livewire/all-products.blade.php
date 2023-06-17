<div>
    @if ($collections->count() == 0)
    <div style="display: block; clear: both;text-align: center">
        <p>No Products Founded Please Add Products 🤗</p>
    </div>
    @else
        <div class="table-responsive table table-hover table-striped">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Product Name</th>
                <th class="border-top-0">price</th>
                <th class="border-top-0">Count</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collections as $key => $col)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$col->name}}</td>
                <td>{{$col->price}}</td>
                <td>{{$col->count}}</td>
                <td>
                    <a href="{{route('admin.products.edit',$col->id )}}">
                    <button class="btn btn-primary" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                </a>
                    <form method="POST" action="{{route('admin.collectionDeleteProduct', $col->id)}}" style="display: inline-block">
                        @csrf
                    <button class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </form>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endif

</div>
