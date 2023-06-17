
<div style="direction: block;float: right;">

    {{-- <form action="{{route('admin.export')}}" method="post" enctype="multipart/form-data">
        @csrf
    <button type="sumbit" class="btn btn-primary"  />DownloadFile</button>
    </form> --}}
    <form action="{{route('admin.bulkproducts', $myid)}}" method="POST" class="bulkForm" id="bulkForm" enctype="multipart/form-data">
        @csrf
        <input type="file" id="myFileInput" name="BulkFile" style="visibility: hidden" accept=".exel, .csv, .xlsx"/>
        <button type="button" class="btn btn-danger" onclick="document.getElementById('myFileInput').click()" >
            <i class="fas fa-file-csv"> </i>   Bulk Products
        </button>
        <script>document.getElementById("myFileInput").onchange = function() {
            document.getElementById("bulkForm").submit();
        };
        </script>
    </form>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    <i class="fas fa-plus"> </i> Add New Product
</button>

<!-- Modal -->
<div  wire:ignore.self class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('message') }}</p>
        @endif
        <form class="form-horizontal form-material mx-2"  method="POST" action="{{--Route('admin.collectionSaveNewProduct', $id = $collection->id)--}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="col-md-12 mb-0">Product Name</label>
                <div class="col-md-12">
                    @error('name')
                    <span class="validateforms" style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Enter Product Name..."
                        class="form-control ps-0 form-control-line" name="name" wire:model.defer="data.name" autocomplete="off">
                </div>
                <label class="col-md-12 mb-0">Product Price</label>

                <div class="col-md-12">
                    @error('name')
                    <span class="validateforms" style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Enter Product price..."
                        class="form-control ps-0 form-control-line" name="price" wire:model.defer="data.price"  autocomplete="off">
                </div>
                <label class="col-md-12 mb-0">Product Count</label>
                <div class="col-md-12">
                    @error('name')
                    <span class="validateforms" style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Enter Product Count..."
                        class="form-control ps-0 form-control-line" name="count" wire:model.defer="data.count"  autocomplete="off">
                </div>
                <div class="col-md-12">
                    <label for="exampleFormControlSelect1">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        @foreach ($categorys as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                  </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click="AddProductCollection" class="btn btn-primary">Add Product</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<div class="clearfix"></div>
<a href="{{asset('csv/products.xlsx')}}" download>CSV DEMO FILE</a>
<div class="clearfix"></div>
