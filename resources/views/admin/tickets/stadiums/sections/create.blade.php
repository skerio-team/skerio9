{{-- Section Modal --}}
<div class="modal fade" id="addSection" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Sektor qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.tickets.stadiums.sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Stadionni tanlang</label>
                                <select name="stadium_id" class="form-control">
                                        <option value="">Stadionni tanlang</option>
                                    @foreach ($stadiums as $stadium)
                                        <option value="{{ $stadium->id }}" {{ old('stadium_id') == $stadium->id ? 'selected' : ' '  }}>{{ $stadium->name }}</option>
                                    @endforeach
                                </select>
                                @error('stadium_id')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-5 col-md-4">
                            <div class="form-group ">
                                <label class="">Rasm</label>
                                <div id="image-preview" class="image-preview" style="width: 100%">
                                    <label for="image-upload" id="image-label">Rasm</label>
                                    <input type="file" name="image[]" id="image-upload" multiple />
                                </div>
                                @error('image')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-7 col-md-8">
                            <div class="form-group">
                                <label for="name">Nomi</label>
                                <input type="text" class="form-control" placeholder="Sektor nomi" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Narxi</label>
                                <input type="number" class="form-control" placeholder="Sektor narxi" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="capacity">Sig'imi</label>
                                <input type="number" class="form-control" placeholder="Sektor sig'imi" name="capacity" value="{{ old('capacity') }}">
                                @error('capacity')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>
                        </div>
                    </div>

          </div>
            </form>
        </div>
    </div>
</div>
