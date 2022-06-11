@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

    @section('content')

    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible alert-sm show fade">
          <div class="alert-body">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
              <h5><i class="icon fas fa-check"></i></h5>
              {{session('success')}}
          </div>
      </div>
    @endif
    @if (Session::has('warning'))
        <div class="alert alert-danger alert-dismissible show fade">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
            <h5><i class="icon fas fa-ban"></i> </h5>
            {{session('warning')}}
        </div>
    @endif
    @if (Session::has('errors'))
      <div class="alert alert-danger alert-dismissible show fade">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
        <h5><i class="icon fas fa-ban"></i> </h5>
        @foreach ($errors->get('country') as $message)
        {
            {{ $message }}
        }
        @endforeach
      </div>
    @endif

    <div class="row">
        {{-- Add Country --}}
        <div class="col-12 col-sm-3 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Davlatlar</h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCountry">{{ __("Qo'shish") }}</button>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($countries as $country)
                    <tr class="odd">
                      <td>{{ ((($countries->currentPage()-1) * $countries->perPage() + ($loop->index+1))) }}</td>
                      <td>{{ $country->country }}</td>
                      <td class="d-flex justify-content-center" style="width: 30%">
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editCountry{{$country->id}}"><i class="fas fa-edit"></i></button>
                          <form action="{{ route('admin.complexes.locations.countries.destroy', ['country' => $country->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                    </tr>

                    @include('admin.sport_complexes.locations.country.edit')

                    @endforeach

                    @include('admin.sport_complexes.locations.country.create')
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  {!! $countries->links() !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>

          {{-- Add Region --}}
        <div class="col-12 col-sm-3 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between">

              {{-- Dropdown --}}
              <div style="width: 40%">
                <select class="form-control bg-primary text-light" id="country-dropdown">
                  <option value="">Davlatni tanlang</option>
                  @foreach ($countries as $country)
                      <option value="{{ $country->id }}">
                          {{ $country->country }}
                      </option>
                  @endforeach
                </select>
              </div>

              <h4>Viloyatlar</h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRegion">Qo'shish</button>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($regions as $region)
                  <tr>
                    <td>{{ ((($regions->currentPage()-1) * $regions->perPage() + ($loop->index+1))) }}</td>
                    <td>{{ $region->name}} [{{ $region->countries['country'] }}]</td>
                    <td class="d-flex justify-content-center" style="width: 30%">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editRegion{{$region->id}}"><i class="fas fa-edit"></i></button>
                        <form action="{{ route('admin.complexes.locations.regions.destroy', ['region' => $region->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                  </tr>

                  @include('admin.sport_complexes.locations.region.edit')
                  
                  @endforeach

                  @include('admin.sport_complexes.locations.region.create')

                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  {!! $regions->links() !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>

          {{-- Add Area --}}
        <div class="col-12 col-sm-3 col-md-4 col-lg-4">
            <div class="card">
              <div class="card-header d-flex justify-content-between">

                {{-- Dropdown --}}
                <div style="width: 30%">
                  <select class="form-control bg-primary text-light" id="country-dropdown">
                    <option value="">Davlatni tanlang</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">
                            {{ $country->country }}
                        </option>
                    @endforeach
                  </select>
                </div>

                {{-- Dropdown --}}
                <div style="width: 30%">
                  <select class="form-control bg-primary text-light" id="country-dropdown">
                    <option value="">Viloyatni tanlang</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">
                            {{ $region->name }}
                        </option>
                    @endforeach
                  </select>
                </div>

                <h4>Hududlar</h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addArea">Qo'shish</button>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($areas as $area)
                    <tr>
                      <td>{{ ((($areas->currentPage()-1) * $areas->perPage() + ($loop->index+1))) }}</td>
                      <td>{{ $area->name}} [{{ $area->regions['name'] }}, {{ $area->regions->countries['country'] }}]</td>
                      <td class="d-flex justify-content-center" style="width: 30%">
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editArea{{$area->id}}"><i class="fas fa-edit"></i></button>
                          <form action="{{ route('admin.complexes.locations.areas.destroy', ['area' => $area->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                    </tr>

                    @include('admin.sport_complexes.locations.area.edit')
                    
                    @endforeach

                    @include('admin.sport_complexes.locations.area.create')

                  </table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    {!! $areas->links() !!}
                  </ul>
                </nav>
              </div>
            </div>
        </div>
    </div>

    {{-- @include('admin.sport_complexes.locations.create') --}}

    @endsection

@section('scripts')
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/page/datatables.js"></script>
@endsection
