{{-- Area Modal --}}
<div class="modal fade" id="editArea{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal"> {{ __("Hudud nomini tahrirlash") }} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.areas.update', $area->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label> {{ __("Viloyatni tanlang") }} </label>
                        <select name="region_id" class="form-control">
                                <option value="{{ $area->region_id }}"> {{ $area->regions->name }} [{{ $area->regions->countries['country'] }}] </option>
                            @foreach ($regions as $region)
                                <option {{ old('region_id', $area->id) == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->name }} [{{ $region->countries['country'] }}]</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name"> {{ __("Hudud nomi") }} </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $area->name) }}">
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect"> {{ __("Saqlash") }} </button>
                </div>
            </form>
        </div>
    </div>
</div>
