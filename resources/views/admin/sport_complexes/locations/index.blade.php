@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
        <div class="col-12 col-md-4 col-lg-4 col-sm-3">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Davlatlar</h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCountry">{{ __("Qo'shish") }}</button>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md" id="table-1">
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
                      <td>{{ (($loop->iteration)) }}</td>
                      <td>{{ $country->country }}</td>
                      <td>
                          {{-- <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                          <form action="{{ route('admin.complexes.locations.countries.destroy', ['country' => $country->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  {!! $countryPaginations->links() !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>

          {{-- Add Region --}}
        <div class="col-12 col-md-4 col-lg-4 col-sm-3">
          <div class="card">
            <div class="card-header d-flex justify-content-between">

              {{-- Dropdown --}}
              <div class="dropdown d-inline mr-2">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Davlatni tanlang
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
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
                    <td>{{ (($loop->iteration)) }}</td>
                    <td>{{ $region->name}} [{{ $region->countries['country'] }}]</td>
                    <td>
                        {{-- <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                        <form action="{{ route('admin.complexes.locations.regions.destroy', ['region' => $region->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active"><a class="page-link" href="#">1 <span
                        class="sr-only">(current)</span></a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

          {{-- Add Area --}}
        <div class="col-12 col-md-4 col-lg-4 col-sm-3">
            <div class="card">
              <div class="card-header d-flex justify-content-between">

                {{-- Dropdown --}}
                <div class="dropdown d-inline mr-2">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Davlatni tanlang
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>

                {{-- Dropdown --}}
                <div class="dropdown d-inline mr-2">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Viloyatni tanlang
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
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
                      <td>{{ (($loop->iteration)) }}</td>
                      <td>{{ $area->name}} [{{ $area->regions['name'] }}, {{ $area->regions->countries['country'] }}]</td>
                      <td>
                          {{-- <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                          <form action="{{ route('admin.complexes.locations.areas.destroy', ['area' => $area->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1 <span
                          class="sr-only">(current)</span></a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
        </div>
    </div>

    @include('admin.sport_complexes.locations.create')

    @endsection

@section('scripts')
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/page/datatables.js"></script>
@endsection
