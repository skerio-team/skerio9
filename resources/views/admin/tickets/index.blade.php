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
                    <h5 align="center">Chiptalar jadvali</h5>
                    <a class="btn btn-success " href="{{ route('admin.tickets.table.create')}}">Qo'shish</a>
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
                                    <th>Sana</th>
                                    <th>Narxi</th>
                                    <th>Tavsif(UZ)</th>
                                    <th>Rasmi</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                <tr class="odd">
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $ticket->name }} </td>
                                    <td> {{ $ticket->date }} </td>
                                    <td> {{ number_format($ticket->price) }} </td>
                                    <td class="d-inline-block text-truncate" style="max-width: 200px;"> {{ $ticket->translate('uz')->description }} </td>
                                    <td style="width: 30%">
                                        @if (!empty($ticket->image))
                                            @php
                                                $images=explode("|", $ticket->image);
                                            @endphp

                                            @foreach ($images as $img)
                                                <img src="/admin/images/tickets/{{ $img }}" width="100%"> <hr>
                                            @endforeach
                                        @else 
                                            <h5 class="text-danger"> Rasm mavjud emas! </h5>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($ticket->status == 1)
                                            <span class="badge badge-success">Faol</span>
                                        @else
                                            <span class="badge badge-danger">Faol emas</span>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center ">
                                        <a class="btn btn-primary" href="{{ route('admin.tickets.table.show', $ticket->id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-info" href="{{ route('admin.tickets.table.edit', $ticket->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.tickets.table.destroy', $ticket->id) }}" method="post">
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