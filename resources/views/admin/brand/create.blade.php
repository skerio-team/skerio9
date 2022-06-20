{{-- Brand Modal --}}
<div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="formModal"> {{ __("Brand qo'shish") }} </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
              
                <div class="form-group">
                  <label> {{ __("Nomi") }} </label>
                  <input type="text" class="form-control" placeholder="Nomini kiriting" name="name" value="{{ old('name') }}" >
                   @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                   @enderror
                </div>
                <div class="form-group ">
                    <label class=""> {{ __("Rasm") }} </label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label"> {{ __("Rasm") }} </label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                    @error('image')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __("Qo'shish") }} </button>
                </div>

              </div>
          </form>
      </div>
  </div>
</div>

