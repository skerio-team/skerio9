@extends('layouts.admin')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/bundles/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')
{{-- @php
    dd($user->roles)
@endphp --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        @can('user-create')
            <div class="card-header ">
                <a class="btn btn-primary " href="{{ route('admin.users.create')}}">Yaratish</a>
            </div>
        @endcan

        <div class="card-body">
            <h5 align="center">Foydalanuvchilar & Adminlar ro'yxati</h5>
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
                    <th class="text-center"> # </th>
                    <th> Ismi </th>
                    <th>Email</th>
                    <th> Vazifa/Huquq </th>
                    <th>Amallar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $user)
                <tr class="odd">
                    <td>{{$loop->iteration}}</td>
                    <td >{{ $user->name }}</td>
                    <td >{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                          @foreach($user->getRoleNames() as $v)
                             <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                        @else
                            <span>Oddiy Foydalanuvchi</span>
                        @endif
                      </td>

                    <td class="d-flex justify-content-center ">
                        <a class="btn btn-primary  " href="{{route('admin.users.show', $user->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        @can('user-edit')
                            <a class="btn btn-info " href="{{route('admin.users.edit', $user->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        @endcan
                        @can('user-delete')
                            @if ($user->email !== 'general@gmail.com')
                                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
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
