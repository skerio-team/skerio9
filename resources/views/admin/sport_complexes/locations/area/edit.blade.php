{{-- Area Modal --}}
<div class="modal fade" id="editArea{{$area->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Hudud qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.areas.update', $area->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Viloyatni tanlang</label>
                        <select name="region_id" class="form-control">
                                <option value="{{ $area->region_id }}"> {{ $area->regions->name }} [{{ $area->regions->countries['country'] }}] </option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }} [{{ $region->countries['country'] }}]</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Hudud nomi</label>
                        <input type="text" class="form-control" placeholder="Hudud nomi" name="name" id="name" value="{{ $area->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>