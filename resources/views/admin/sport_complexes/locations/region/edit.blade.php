{{-- Region Modal --}}
<div class="modal fade" id="editRegion{{$region->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Viloyat qo'shish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.regions.update', $region->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Davlatni tanlang</label>
                        <select name="country_id" class="form-control">
                                <option value="{{ $region->country_id }}">{{ $region->countries['country'] }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="name">Viloyat nomi</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $region->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>