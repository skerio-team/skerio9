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
    {{-- @if ($errors)
      <div class="alert alert-danger alert-dismissible show fade">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>&times;</span> </button>
        <h5><i class="icon fas fa-ban"></i> </h5>
        @foreach ($errors->get('country') as $message)
        {
            {{ $message }}
        }
        @endforeach
      </div>
    @endif --}}

    <div class="row">
      {{-- Add Country --}}
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Davlatlar</h4>              
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCountry">{{ __("Qo'shish") }}</button>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($countries as $country)
                  <tr>
                    <td>{{ $country->id }}</td>
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
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                  </li>
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

          {{-- Add Region --}}
        <div class="col-12 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
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
                    <td>{{ $region->id }}</td>
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
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
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
                      <td>{{ $area->id }}</td>
                      <td>{{ $area->name}}</td>
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