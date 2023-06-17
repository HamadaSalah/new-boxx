<div>
    @if(Session::has('message'))
    <div class="alert alert-success">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
            <i class="nc-icon nc-simple-remove"></i>
        </button>
        <span>
            <b> Success - </b> {{ Session::get('message') }}</span>
    </div>
    @endif
    @if ($colcs->count() == 0)
        <p style="text-align: center">No Collection Founded 🙂</p>
    @else
    <div >
            <div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Collection</h4>
                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Collection Name</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colcs as $col)
                                    <tr>
                                        <td>{{$col->id}}</td>
                                        <td>{{$col->name}}</td>
                                        <td><span class="date_green">{{$col->created_at->toDateString()}}</span></td>
                                        <td>
                                            <button wire:click="deleteData({{$col->id}})" class="btn btn-danger">Delete</button>
                                            <a href="{{Route('admin.collectionaddNewProduct', $col->id)}}">
                                                <button class="btn btn-success">Manage Products</button>
                                                </a>
                                        </td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            {{$colcs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
