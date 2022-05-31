@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

    @section('content')
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Davlat qo'shish</h4>
          </div>
          <form action="{{ route('admin.complexes.locations.createCountry') }}" method="POST">
              @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="country_name">{{ __("Davlat nomi") }}</label>
                    <input type="text" class="form-control" placeholder="Davlat nomi" name="country_name">
                </div>
                <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>  
            </div>
          </form>
        </div>
      </div>





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
                <form action="{{ route('admin.complexes.storeCountry') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="country_name">{{ __("Davlat nomi") }}</label>
                            <input type="text" class="form-control" placeholder="Davlat nomi" name="country_name">
                        </div>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">{{ __("Qo'shish") }}</button>  
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Region Modal --}}
    <form action="{{ route('admin.complexes.storeRegion') }}" method="POST">
    @csrf
        <div class="modal fade" id="addRegion" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Viloyat qo'shish</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="region_name">Viloyat nomi</label>
                                <input type="text" class="form-control" placeholder="Viloyat nomi" name="region_name">
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>

                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Area Modal --}}
    <form action="{{ route('admin.complexes.storeArea') }}" method="POST">
        @csrf
        <div class="modal fade" id="addArea" tabindex="-1" role="dialog" aria-labelledby="formModal"aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModal">Hudud qo'shish</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="region_name">Hudud nomi</label>
                                <input type="text" class="form-control" placeholder="Hudud nomi" name="hudud_name">
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Qo'shish</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection

@section('scripts')
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/page/datatables.js"></script>
@endsection