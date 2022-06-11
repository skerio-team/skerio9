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
        @can('size-create')
            <div class="card-header ">
                <a class="btn btn-primary " href="{{ route('admin.sizes.create')}}">Yaratish</a>
            </div>
        @endcan

        <div class="card-body">
            <h5 align="center">O'lchamlar jadvali</h5>
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
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Raqam</th>
                <th>Harf</th>
                <th style="width: 67px">Amallar</th>
              </tr>

              @foreach ($items as $item)
              <tr >
                 <td>{{$loop->iteration}}</td>
                 <td>{{$item->number}}</td>
                 <td>{{$item->letter}}</td>
                 <td class=" d-flex justify-content-center" style="width: 100px">
                    @can('size-edit')
                        <a class="btn btn-info " href="{{route('admin.sizes.edit', $item->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endcan
                    @can('size-delete')
                        <form action="{{route('admin.sizes.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger deleteCat ">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    @endcan
                </td>
              </tr>
              @endforeach

            </table>
          </div>
        </div>
        <div class="card-footer text-right">
            <div class="d-flex justify-content-right pagination">
                {!! $items->links() !!}
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
