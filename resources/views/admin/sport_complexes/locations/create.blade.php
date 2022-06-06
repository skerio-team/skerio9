{{-- Country Modal --}}
<div class="modal fade" id="addCountry" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Davlat qo'shish") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.complexes.locations.countries.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="country">{{ __("Davlat nomi") }}</label>
                        <input type="text" class="form-control" placeholder="Davlat nomi" name="country">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>  
                </div>
            </form>
        </div>
    </div>
</div>

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
                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="name">Viloyat nomi</label>
                        <input type="text" class="form-control" placeholder="Viloyat nomi" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                                <option value="{{ $region->id }}">{{ $region->name }} [{{ $region->countries['country'] }}]</option>
                            @endforeach
                        </select>
                        <label for="name">Hudud nomi</label>
                        <input type="text" class="form-control" placeholder="Hudud nomi" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                </div>
            </form>
        </div>
    </div>
</div>
