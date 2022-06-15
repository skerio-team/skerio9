{{-- Region Modal --}}
<div class="modal fade" id="addRegion" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Viloyat qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.regions.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Davlatni tanlang</label>
                        <select name="country_id" class="form-control">
                                <option value="">Davlatni tanlang</option>
                            @foreach ($countries as $country)
                                <option {{ old('country_id' ) == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="name">Viloyat nomi</label>
                        <input type="text" class="form-control" placeholder="Viloyat nomi" name="name" value="{{ old('name') }}">
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
