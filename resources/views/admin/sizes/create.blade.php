{{-- Category Modal --}}
<div class="modal fade" id="addSize" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="formModal">Mahsulot o'lchami qo'shish</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('admin.sizes.store') }}" method="POST">
              @csrf
              <div class="modal-body">
              
                <div class="form-group">
                  <label>Raqam</label>
                  <input type="number" class="form-control" placeholder="Raqam kiriting" name="number" value="{{ old('number') }}" >
                  @error('number')
                      <div class="alert alert-danger">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
  
                <div class="form-group">
                  <label>Harf</label>
                  <input type="text" class="form-control" placeholder="Harf kiriting" name="letter" value="{{ old('letter') }}">
                  @error('letter')
                      <div class="alert alert-danger">
                          {{ $message }}
                      </div>
                  @enderror
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                </div>

              </div>
          </form>
      </div>
  </div>
</div>
