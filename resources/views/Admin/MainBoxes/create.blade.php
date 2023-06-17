@extends('Admin.master')
@section('content')
<h2 class="collectioName">Create New Box</h2>

<div class="clearfix"></div>
<form method="POST" action="{{route('admin.mainboxes.store')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
	<div class="form-group">
		<label for="name_en">Box Name (EN)</label>
		<input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Product Name" >
	</div>
	<div class="form-group">
		<label for="name_ar">Box Name (AR)</label>
		<input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="Enter Product Name" >
	</div>
	<div class="form-group">
		<label for="price">Price From</label>
		<input type="text" class="form-control" name="pricefrom" id="price" placeholder="Enter Price" >
	</div>
	<div class="form-group">
		<label for="price">Price To</label>
		<input type="text" class="form-control" name="priceto" id="price" placeholder="Enter Price" >
	</div>
	<div class="form-group">
		<label for="endDate">End Date</label>
		<input type="date" class="form-control" name="endDate" id="endDate" placeholder="Enter endDate" >
	</div>
	<div class="form-group">
		<label for="desc">Description</label>
		<textarea cols="10" class="form-control" name="desc" id="desc" placeholder="Enter description" ></textarea>
	</div>
    <div class="form-group">
		<label for="img">Box Img</label>
		<input type="file" name="img" class="form-control" id="img" >
	</div>
    <div class="form-group">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>


@endsection
