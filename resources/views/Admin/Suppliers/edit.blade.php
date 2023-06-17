
@extends('Admin.master')
@section('content')
<h2 class="collectioName">Edit Supplier</h2>
<div class="clearfix"></div>

<form method="POST" action="{{route('admin.suppliers.update', $supplier->id)}}">
    @method('PUT')
    @csrf
  <div class="form-group">
      <label for="name">Supplier Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Supplier Name" value="{{$supplier->name}}" >
  </div>
  <div class="form-group">
      <label for="fb">Facebook Link</label>
      <input type="text" class="form-control" name="facebook" id="fb" placeholder="Enter Facebook Link" value="{{$supplier->facebook}}" >
  </div>
  <div class="form-group">
      <label for="tw">Twitter Link</label>
      <input type="text" class="form-control" name="twitter" id="tw" placeholder="Enter Twitter Link" value="{{$supplier->twitter}}" >
  </div>
  <div class="form-group">
      <label for="insta">Instagram Link</label>
      <input type="text" class="form-control" name="instagram" id="insta" placeholder="Enter Instagram Link" value="{{$supplier->instagram}}" >
  </div>
  <div class="form-group">
      <label for="yt">Youtube Link</label>
      <input type="text" class="form-control" name="youtube" id="yt" placeholder="Enter Youtube Link" value="{{$supplier->youtube}}" >
  </div>

</div>
<div class="modal-footer">
  <button type="submit"  class="btn btn-primary">Edit Supplier</button>
</div>
</form>



@endsection
