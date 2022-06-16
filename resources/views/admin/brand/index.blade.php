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

        @can('brand-create')
            <div class="card-header d-flex justify-content-between">
                <h5 align="center">Brendlar jadvali</h5>
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrand">Qo'shish</button>
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
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            @error('image')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Rasm</th>
                <th>Amallar</th>
              </tr>

              @foreach ($items as $item)
              <tr >
                 <td>{{$loop->iteration}}</td>
                 <td>{{$item->name}}</td>
                 <td class=""><img src="/admin/images/brands/{{$item->image}}" width="100px" alt="" srcset=""></td>
                 <td class=" d-flex justify-content-center">

                    @can('brand-edit')
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editBrand{{$item->id}}"><i class="fas fa-edit"></i></button>
                    @endcan
                    @can('brand-delete')
                        <form action="{{route('admin.brands.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger deleteCat ">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    @endcan
                </td>
              </tr>
              @include('admin.brand.edit')

              @endforeach

              @include('admin.brand.create')

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
