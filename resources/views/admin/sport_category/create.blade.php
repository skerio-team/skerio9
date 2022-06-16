{{-- Category Modal --}}
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Kategoriya qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                
                    <div class="form-group">
                        <label>Nomi (UZ)</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="uz[name]"  value="{{ old('uz.name') }}">
                        @error('uz.name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Nomi(RU)</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="ru[name]" value="{{ old('ru.name') }}">
                        @error('ru.name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label>Nomi(EN)</label>
                        <input type="text" class="form-control" placeholder="Nomini kiriting" name="en[name]" value="{{ old('en.name') }}">
                        @error('en.name')
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
