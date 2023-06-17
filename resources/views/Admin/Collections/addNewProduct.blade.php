@extends('Admin.master')
@section('content')
<h2 class="collectioName">{{$collection->name}}</h2>
<livewire:all-collection-product :id='$collection->id' />
<livewire:all-products :collection='$collection->id' />
<div class="clear"></div>
@if ($collection->products()->count() > 0)

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#createBoxes">
  Create Boxes
</button>

<!-- Modal -->
<div  wire:ignore.self class="modal fade" id="createBoxes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create Boxes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form class="form-horizontal form-material mx-2"  method="POST" action="{{Route('admin.createboxes', $collection->id)}}" enctype="multipart/form-data">
               @csrf
               <div class="form-group" style="padding: 15px">
                <label for="exampleFormControlSelect1">Select Type Of Matching</label>
                <select name="type" class="form-control" id="exampleFormControlSelect1" style="padding: 0 10px">
                  <option>Randomly</option>
                  <option>By Category</option>
                  <option>By Brand</option>
                </select>
              </div>

              <div class="form-group">
                <label class="col-md-12 mb-0">Boxes Count</label>
                <div class="col-md-12">
                    @error('BoxesCount')
                    <span class="validateforms" style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="number" required placeholder="Enter Boxes Count..." class="form-control ps-0 form-control-line" name="BoxesCount">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0">Max Price</label>
                <div class="col-md-12">
                    @error('Max')
                    <span class="validateforms" style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="number" required placeholder="Enter Boxes Max Price..." class="form-control ps-0 form-control-line" name="Max">
                </div>
            </div>
        <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit"  class="btn btn-primary">Generate Boxes</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>



@endif
<!-- Modal -->
@endsection
