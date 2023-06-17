@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Box Name : <span style="font-weight: bold">{{$box->name ? $box->name : 'No Name'}}</span style="font-weight: bold"></h2>

<div class="clearfix"></div>

<form method="POST" action="{{route('admin.boxes.update', $box->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Box Name</label>
        <input type="text" name="name"  class="form-control" id="name" value="{{$box->name}}" placeholder="Write Box Price..">
      </div>
      <div class="form-group">
        <label for="name">Box Price</label>
        <input type="number" name="price" class="form-control" id="name" value="{{$box->price}}" placeholder="Write Box Name..">
      </div>
      <div class="form-group">
        <label for="file">Box Img</label>
        <input type="file" name="img" class="form-control" id="file">
      </div>
      <div class="form-group">
        <label for="file">Status</label>
        <select class="form-select" aria-label="Status" name="st">
            <option value="Default">Default</option>
            <option value="New">Hot</option>
            <option value="Offer">Offer</option>
        </select>
      </div>
      <div class="form-group">
        <label for="file">End Date</label>
      <input id="datepicker" name="end_date" placeholder="Write End Date" width="276" value="{{$box->end_date}}"/>
      <script>
          $('#datepicker').datepicker({
              uiLibrary: 'bootstrap4'
          });
      </script>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
