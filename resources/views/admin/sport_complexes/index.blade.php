@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

    @section('content')
    <div class="row">
        <div class="col-12">
          <div class="card">
    
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">Majmualar jadvali</h5>
                    <a class="btn btn-success " href="{{ route('admin.complexes.create')}}">Qo'shish</a>
                </div>

            <div class="card-body">
                <h5 align="center">Majmualar jadvali</h5>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                <span>&times;</span>
                            </button>
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
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                        <th class="text-center"> # </th>
                        <th>Nomi</th>
                        <th>Tavsif(UZ)</th>
                        <th>Narxi</th>
                        <th>Telefon Raqami</th>
                        <th>Manzil</th>
                        <th>Dush</th>
                        <th>O'rindiqlar</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($complexes as $complex)
                    <tr class="odd">
                        <td>{{$loop->iteration}}</td>
                        <td >{{ $complex->name }}</td>
                        {{-- <td class=""><img src="/admin/images/complexes/{{$complex->image}}" width="100px" alt="" srcset=""></td> --}}
                        <td >{{ $complex->translate('uz')->description }}</td>
                        <td >{{ $complex->price }}</td>
                        <td >{{ $complex->phone }}</td>
                        <td >{{ $complex->address }}</td>
                        <td >{{ $complex->bath_room }}</td>
                        <td >{{ $complex->sit_place }}</td>
                        <td >
                            <span class="badge @if ($complex->status==1) badge-success @else badge-danger @endif">{{ $complex->status }}</span>
                        </td>

                        <td class="d-flex justify-content-center ">
                            <a class="btn btn-primary  " href="{{route('admin.complexes.show', $complex->id)}}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-info " href="{{route('admin.complexes.edit', $complex->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.complexes.destroy', $complex->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
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