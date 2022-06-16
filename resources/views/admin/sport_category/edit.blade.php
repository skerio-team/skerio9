{{-- Category Modal --}}
<div class="modal fade" id="editCategory{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Kategoriya nomini tahrirlash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.categories.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                
                    <div class="form-group">
                        <label>Nomi(UZ)</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="uz[name]"  value="{{ old('uz.name', $item->translate('uz')->name) }}" >
                        @error('uz.name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Nomi(RU)</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="ru[name]"  value="{{ old('ru.name', $item->translate('ru')->name) }}" >
                        @error('ru.name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Nomi(EN)</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="en[name]"  value="{{ old('en.name', $item->translate('en')->name) }}" >
                        @error('en.name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Saqlash</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
