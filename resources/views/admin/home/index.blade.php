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
        @can('home-create')
            <div class="card-header d-flex justify-content-between">
                <h5 align="center">Bosh menyu ma'lumotlar jadvali</h5>
                <a class="btn btn-success " href="{{ route('admin.homes.create')}}">Yaratish</a>
            </div>
        @endcan

        <div class="card-body">
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
                    <th>Sarlovha(UZ)</th>
                    <th>Tavsif(UZ)</th>
                    <th>Rasmi</th>
                    <th>Amallar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                <tr class="odd">
                    <td>{{$loop->iteration}}</td>
                    <td >{{ $item->translate('uz')->title }}</td>
                    <td class="d-inline-block text-truncate" style="max-width: 400px;">{{ $item->translate('uz')->description }}</td>

                    <td class=""><img src="/admin/images/homes/{{$item->image}}" width="100px" alt="" srcset=""></td>

                    <td class="d-flex justify-content-center ">
                        <a class="btn btn-primary  " href="{{route('admin.homes.show', $item->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('home-edit')
                            <a class="btn btn-info " href="{{route('admin.homes.edit', $item->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan

                        @can('home-delete')
                            <form action="{{route('admin.homes.destroy', $item->id)}}" method="item">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
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
