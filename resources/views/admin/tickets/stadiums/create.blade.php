{{-- Stadium Modal --}}
<div class="modal fade" id="addStadium" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">{{ __("Stadion qo'shish") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.tickets.stadiums.table.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ __("Stadion nomi") }}</label>
                        <input type="text" class="form-control" placeholder="Stadion nomi" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>  
                </div>
            </form>
        </div>
    </div>
</div>