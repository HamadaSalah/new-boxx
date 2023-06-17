
@extends('Admin.master')
@section('content')
<h2 class="collectioName">Edit Product {{$product->name}}</h2>
<div class="clearfix"></div>
<form method="POST" action="{{route('admin.products.update', $product->id)}}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
	<div class="form-group">
		<label for="name">Product Name</label>
		<input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" value=" {{$product->name}}" >
	</div>
	<div class="form-group">
		<label for="price">Product Price</label>
		<input type="text" class="form-control" name="price" id="price" placeholder="Enter Product Price" value=" {{$product->price}}">
	</div>
    <div class="row">
        <div class="form-group col-md-6">
		<label for="img">Product Img</label>
		<input type="file" name="img" class="form-control" id="img" >
	    </div>
        <div class="form-group col-md-6">
            <label for="supp">Supplier</label>
            <select class="form-select " style="width: 100%" aria-label="Default select example" name="supp_id" id="supp">
                <option selected value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option <?php if($supplier->id == $product->supp_id ) echo "selected";?> value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="img">Category</label>
            <select class="form-select " style="width: 100%" aria-label="Default select example" name="category">
                <option selected> Select Category</option>
                @foreach ($categs as $cat)
                    <option <?php if($cat->name == $product->category ) echo "selected";?> value="{{$cat->name}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="img">Brand</label>
            <select class="form-select " style="width: 100%" aria-label="Default select example" name="brand">
                <option selected>Select Brand</option>
                @foreach ($brands as $brand)
                    <option <?php if($brand->name == $product->brand ) echo "selected";?> value="{{$brand->name}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>


    </div>

    <label for="ckedit">Details</label>
    <textarea class="form-control" id="summary-ckeditor" id="ckedit" name="details"> {{$product->details}}</textarea>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('admin.CKUploader', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',

        });
    </script>
	<div class="form-group">
		<label for="video">Video</label>
		<input type="file" name="video" class="form-control" id="video" >
	</div>

	<button type="submit" class="btn btn-primary mt-4">Submit</button>
  </form>

@endsection
