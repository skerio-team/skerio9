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
            @can('role-create')
                <div class="card-header ">
                    <a class="btn btn-primary " href="{{ route('admin.roles.create')}}">Yaratish</a>
                </div>
            @endcan

        <div class="card-body">
            <h5 align="center">  </h5>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <span>×</span>
                        </button>
                        <h5><i class="icon fas fa-check"></i></h5>
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @if (Session::has('warning'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> <span>×</span> </button>
                    <h5><i class="icon fas fa-ban"></i> </h5>
                    {{session('warning')}}
                </div>
            @endif
          <div class="table-responsive">
            <table class="table table-striped" id="table-1">
              <thead>
                <tr>
                    <th style="width: 100px"> # </th>
                    <th style=""> Nomi </th>
                    <th class="" style="width: 150px">Amallar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                <tr class="odd">
                    <td>{{$loop->iteration}}</td>
                    <td >{{ $role->name }}</td>
                    <td class="d-flex justify-content-center " style="width:67px">
                        <a class="btn btn-primary  " href="{{route('admin.roles.show', $role->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('role-edit')
                            <a class="btn btn-info " href="{{route('admin.roles.edit', $role->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @can('role-delete')
                            
                            <form action="{{route('admin.roles.destroy', $role->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                @if ($role->id !== 1)
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </form>
                        @endcan
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
