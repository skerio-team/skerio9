{{-- Category Modal --}}
<div class="modal fade" id="editSize{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="formModal"> {{ __("Mahsulot o'lcham nomini tahrirlash") }} </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('admin.sizes.update', $item->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-body">
              
                <div class="form-group">
                  <label> {{ __("Raqam") }} </label>
                  <input type="number" class="form-control" placeholder="Raqam kiriting" name="number" value="{{ old('number', $item->number) }}">
                    @error('number')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                  <label> {{ __("Harf") }} </label>
                  <input type="text" class="form-control" placeholder="Harf kiriting" name="letter" value="{{ old('letter',$item->letter) }}" >
                    @error('letter')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __("Saqlash") }} </button>
                </div>

              </div>
          </form>
      </div>
  </div>
</div>
