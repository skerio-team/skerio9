{{-- Country Modal --}}
<div class="modal fade" id="editCountry{{$country->id}}" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Davlat nomini tahrirlash") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.countries.update', $country->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="country">{{ __("Davlat nomi") }}</label>
                        <input type="text" class="form-control" name="country" value="{{ $country['country'] }}">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Saqlash") }}</button>  
                </div>
            </form>
        </div>
    </div>
</div>