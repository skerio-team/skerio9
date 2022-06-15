{{-- Area Modal --}}
<div class="modal fade" id="addArea" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Hudud qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.areas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Viloyatni tanlang</label>
                        <select name="region_id" class="form-control">
                                <option value="">Viloyatni tanlang</option>
                            @foreach ($regions as $region)
                                <option {{ old('region_id' ) == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }} [{{ $region->countries['country'] }}]</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Hudud nomi</label>
                        <input type="text" class="form-control" placeholder="Hudud nomi" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>
