
@extends('Admin.master')
@section('content')
<h2 class="collectioName">All Suppliers</h2>
<button type="button" class="btn btn-primary add_supp" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-plus-circle"></i> Add Supplier
</button>

<div class="clearfix"></div>
<div class="table-responsive">
    @if ($suppliers->count() > 0)
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Name</th>
                <th class="border-top-0">Facebook</th>
                <th class="border-top-0">twitter</th>
                <th class="border-top-0">Instagram</th>
                <th class="border-top-0">youtube</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $key => $supply)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$supply->name}}</td>
                <td>{{$supply->facebook}}</td>
                <td>{{$supply->twitter}}</td>
                <td>{{$supply->instagram}}</td>
                <td>{{$supply->youtube}}</td>
                <td>
                    <form style="display: inline;" action="{{route('admin.suppliers.destroy', $supply->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{Route('admin.suppliers.edit', $supply->id)}} ">
                        <button class="btn btn-primary"><i class="fa fa-eye"> </i> Edit</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @else
    <p style="text-align: center">No Suppliers Founded</p>
    @endif
</div>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.suppliers.store')}}" method="POST">
              @csrf
            <div class="form-group">
                <label for="name">Supplier Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Supplier Name" >
            </div>
            <div class="form-group">
                <label for="fb">Facebook Link</label>
                <input type="text" class="form-control" name="facebook" id="fb" placeholder="Enter Facebook Link" >
            </div>
            <div class="form-group">
                <label for="tw">Twitter Link</label>
                <input type="text" class="form-control" name="twitter" id="tw" placeholder="Enter Twitter Link" >
            </div>
            <div class="form-group">
                <label for="insta">Instagram Link</label>
                <input type="text" class="form-control" name="instagram" id="insta" placeholder="Enter Instagram Link" >
            </div>
            <div class="form-group">
                <label for="yt">Youtube Link</label>
                <input type="text" class="form-control" name="youtube" id="yt" placeholder="Enter Youtube Link" >
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">Add Supplier</button>
        </div>
        </form>
      </div>
    </div>
  </div>


@endsection
