<div>
    <h2 style="padding-bottom: 35px;float: left;">Brands</h2>
    <button type="button" class="btn btn-primary addCat" data-toggle="modal" data-target="#exampleModalLong">
      Add New Brand
    </button>


    <!-- Modal -->
    <div  wire:ignore.self class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add New Brand</h5>
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
                  <form class="form-horizontal form-material"  method="POST" wire:submit.prevent="AddCol" enctype="multipart/form-data">
                      <div class="form-group">
                          <label class="col-md-12">Brand Name</label>
                          <div class="col-md-12">
                              @error('name')
                              <span class="validateforms" style="color: red">{{ $message }}</span>
                              @enderror
                              <input type="text" placeholder="Enter Brand Name..."
                                  class="form-control ps-0 form-control-line" name="name" wire:model.defer="data.name">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" wire:click="AddCol" class="btn btn-primary">Add Brand</button>
                      </div>
                  </form>
            </div>
          </div>
        </div>
      </div>

</div>
