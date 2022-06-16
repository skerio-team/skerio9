{{-- Brand Modal --}}
<div class="modal fade" id="editBrand{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="formModal"> {{ __("Brand nomini tahrirlash") }} </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('admin.brands.update', $item->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-body">
              
                <div class="form-group">
                  <label>{{ __("Nomi") }}</label>
                  <input type="text" class="form-control" placeholder="Nomini kiriting" name="name"  value="{{ old('name', $item->name) }}">
                   @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                   @enderror
                </div>

                <div class="form-group ">
                  <label class="">{{ __("Rasm") }}</label>
                  <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">{{ __("Rasm") }}</label>
                      <input type="file" name="image" id="image-upload" />
                  </div>
                    @error('image')
                      <div class="alert alert-danger">
                          {{ $message }}
                      </div>
                    @enderror
                </div>

                <div class="row">
                  <img src="/admin/images/brands/{{$item->image}}" width="100%">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __("Saqlash") }} </button>
                </div>

              </div>
          </form>
      </div>
  </div>
</div>

