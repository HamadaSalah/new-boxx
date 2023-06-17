<div style="direction: block;float: right;margin-top: 40px;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Add New Collection
</button>

<!-- Modal -->
<div  wire:ignore.self class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Collection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(Session::has('message'))
        <div class="alert alert-success">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>
                <b> Success - </b> {{ Session::get('message') }}</span>
        </div>
        @endif
            <form class="form-horizontal form-material mx-2"  method="POST" wire:submit.prevent="AddCol" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-12 mb-0">Collection Name</label>
                    <div class="col-md-12">
                        @error('name')
                        <span class="validateforms" style="color: red">{{ $message }}</span>
                        @enderror
                        <input type="text" place               6holder="Enter Collection Name..."
                            class="form-control ps-0 form-control-line" name="name" wire:model.defer="data.name">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" wire:click="AddCol" class="btn btn-primary">Add Collection</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

</div>
