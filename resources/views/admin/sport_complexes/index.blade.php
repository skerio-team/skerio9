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
                    <a class="btn btn-primary" href="{{ route('admin.complexes.table.create')}}">Qo'shish</a>
                </div>

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
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($complexes as $complex)
                                <tr class="odd">
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{ $complex->name }} </td>
                                    <td class="d-inline-block text-truncate" style="max-width: 200px;"> {{ $complex->translate('uz')->description }} </td>
                                    <td> {{ number_format($complex->price) }} </td>
                                    <td> {{ $complex->phone }} </td>
                                    <td> {{ $complex->address }} </td>
                                    <td >
                                        @if ($complex->bath_room==1)
                                            <span class="badge badge-success">Mavjud</span>
                                        @else
                                            <span class="badge badge-danger">Mavjud emas</span>
                                        @endif
                                    </td>
                                    <td >
                                        @if ($complex->status==1)
                                            <span class="badge badge-success">Faol</span>
                                        @else
                                            <span class="badge badge-danger">Faol emas</span>
                                        @endif
                                    </td>
                                    <td >{{ $complex->created_at }}</td>
                                    <td >{{ $complex->updated_at }}</td>

                                    <td class="d-flex justify-content-center ">
                                        <a class="btn btn-primary" href="{{ route('admin.complexes.table.show', $complex->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{{ route('admin.complexes.table.edit', $complex->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.complexes.table.destroy', $complex->id) }}" method="post">
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

