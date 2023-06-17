@extends('Admin.master')
@section('content')
<h2 class="collectioName">Edit Box</h2>

<div class="clearfix"></div>
<form method="POST" action="{{route('admin.mainboxes.update', $box->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
	<div class="form-group">
		<label for="name_en">Box Name (EN)</label>
		<input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Product Name" value="{{$box->name_en}}">
	</div>
	<div class="form-group">
		<label for="name_ar">Box Name (AR)</label>
		<input type="text" class="form-control" name="name_ar" id="name_ar" placeholder="Enter Product Name" value="{{$box->name_ar}}">
	</div>
	<div class="form-group">
		<label for="pricefrom">Price From</label>
		<input type="number" class="form-control" name="pricefrom" id="pricefrom" placeholder="Enter pricefrom" value="{{$box->pricefrom}}">
	</div>
	<div class="form-group">
		<label for="priceto">Price To</label>
		<input type="number" class="form-control" name="priceto" id="priceto" placeholder="Enter priceto" value="{{$box->priceto}}">
	</div>
	<div class="form-group">
		<label for="endDate">End Date</label>
		<input type="date" class="form-control" name="endDate" id="endDate" placeholder="Enter priceto" value="{{$box->priceto}}">
	</div>
	<div class="form-group">
		<label for="desc">Description</label>
		<textarea cols="10" class="form-control" name="desc" id="desc" placeholder="Enter description" >{{$box->desc}}</textarea>
	</div>
    <div class="form-group">
		<label for="img">Box Img</label>
        <br/>
        <span>OLD IMG</span><br/>
        <a data-fancybox="gallery" href="{{asset('storage/mainboxes/'.$box->img)}}"> <img src="{{asset('storage/mainboxes/'.$box->img)}}" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></a>
		<br/><br/>
        <input type="file" name="img" class="form-control" id="img" >
	</div>
    <div class="form-group">
        <button class="btn btn-primary">Submit</button>
    </div>
</form>


@endsection
