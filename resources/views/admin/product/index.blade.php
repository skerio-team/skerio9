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
            @can('product-create')
                <div class="card-header d-flex justify-content-between">
                    <h5 align="center">Mahsulotlar jadvali</h5>

                    <a class="btn btn-primary" href="{{ route('admin.products.create')}}">Yaratish</a>
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
                    <th>Nomi</th>
                    <th>Tavsif(UZ)</th>
                    <th>Yoqtirishlar soni</th>
                    <th>Rasmi</th>
                    <th>Amallar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                <tr class="odd">
                    <td>{{ ((($items->currentPage()-1) * $items->perPage() + ($loop->index+1))) }}</td>
                    <td> {{ $item->name }} </td>
                    <td> {{ $item->translate('uz')->description }} </td>
                    <td> {{ $item->like }} </td>

                    <td style="width: 15%">
                        @php
                            $images=explode("|", $item->image);
                        @endphp

                        @foreach ($images as $img)
                            <img src="/admin/images/products/{{ $img }}" width="100%"> <hr>
                        @endforeach
                    </td>

                    <td class="d-flex justify-content-center ">
                        <a class="btn btn-primary" href="{{route('admin.products.show', $item->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('product-edit')
                            <a class="btn btn-warning" href="{{route('admin.products.edit', $item->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('product-delete')
                            <form action="{{route('admin.products.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
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
        <div class="card-footer text-right">
            <nav class="d-inline-block">
              <ul class="pagination mb-0">
                {!! $items->links() !!}
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
