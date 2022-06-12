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
        @foreach ($errors->all() as $message)
        {
            {{ $message }} 
        }
        @endforeach
      </div>
    @endif

    <div class="row">
        {{-- Add Stadium --}}
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header d-flex justify-content-between">
              <h4>Stadionlar</h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStadium">{{ __("Qo'shish") }}</button>
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
                    @foreach ($stadiums as $stadium)
                    <tr class="odd">
                      <td>{{ ((($stadiums->currentPage()-1) * $stadiums->perPage() + ($loop->index+1))) }}</td>
                      <td>{{ $stadium->name }}</td>
                      <td class="d-flex justify-content-center" style="width: 30%">
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editStadium{{$stadium->id}}"><i class="fas fa-edit"></i></button>
                          <form action="{{ route('admin.tickets.stadiums.table.destroy', $stadium->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                    </tr>

                    @include('admin.tickets.stadiums.edit')

                    @endforeach

                    @include('admin.tickets.stadiums.create')
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  {!! $stadiums->links() !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>

        {{-- Add Section --}}
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
          <div class="card">
            <div class="card-header d-flex justify-content-between">

              {{-- Dropdown --}}
              <div style="width: 40%">
                <select class="form-control bg-primary text-light">
                  <option value="">Stadionni tanlang</option>
                  @foreach ($stadiums as $stadium)
                      <option value="{{ $stadium->id }}">
                          {{ $stadium->name }}
                      </option>
                  @endforeach
                </select>
              </div>

              <h4 align="center">Sektorlar</h4>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSection">Qo'shish</button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped text-center" id="table-1">
                  <thead>
                    <tr>
                        <th class="text-center"> # </th>
                        <th>Nomi</th>
                        <th>Narxi</th>
                        <th>Sig'imi</th>
                        <th style="width: 20%">Rasmi</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($stadium_sections as $section)
                    <tr class="odd">
                      <td>{{ ((($stadium_sections->currentPage()-1) * $stadium_sections->perPage() + ($loop->index+1))) }}</td>
                      <td>{{ $section->name}} [{{ $section->stadiums['name'] }}]</td>
                      <td> {{ number_format($section->price) }} </td>
                      <td> {{ $section->capacity }} </td>
                      <td>
                        @if (!empty($section->image))
                            @php
                                $images=explode("|", $section->image);
                            @endphp

                            @foreach ($images as $img)
                                <img src="/admin/images/tickets/stadium_sections/{{ $img }}" width="50%"> <hr>
                            @endforeach
                        @else 
                            <h5 class="text-danger"> Rasm mavjud emas! </h5>
                        @endif
                      </td>
                      <td class="d-flex justify-content-center" style="width: 80%">
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editSection{{$section->id}}"><i class="fas fa-edit"></i></button>
                          <form action="{{ route('admin.tickets.stadiums.sections.destroy', $section->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </td>
                    </tr>

                    @include('admin.tickets.stadiums.sections.edit')
                    
                    @endforeach

                    @include('admin.tickets.stadiums.sections.create')
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">
                <ul class="pagination mb-0">
                  {!! $stadium_sections->links() !!}
                </ul>
              </nav>
            </div>
          </div>
        </div>

    </div>

    @endsection

@section('scripts')
    <script src="/assets/bundles/datatables/datatables.min.js"></script>
    <script src="/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/js/page/datatables.js"></script>
@endsection
