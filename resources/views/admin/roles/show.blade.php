@extends('layouts.admin')

@section('css')
        <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="/assets/bundles/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="/assets/bundles/codemirror/theme/duotone-dark.css">

@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card"> <br>
                    <div class="row mb-2">
                        <div class="card-header">
                            <div class=" d-flex justify-content-center">
                                <a href="{{ route('admin.roles.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a> &nbsp;
                                @can('role-edit')
                                    <a href="{{ route('admin.roles.edit', $role->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Tahrirlash</button></a> &nbsp;
                                @endcan
                                @can('role-delete')
                                    <form action="{{route('admin.roles.destroy', $role->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button  style="display: inline" type="submit" class="btn btn-danger btn-sm  ">
                                            <i class="fas fa-trash"  aria-hidden="true"></i>
                                            O'chirish
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <hr>

                        <div class=" d-flex justify-content-center">
                            <div class="box-header"><h5> Nomi </h5></div><br>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active uz-form">
                                <h6> {{$role->name}} </h6>
                            </div>
                        </div> <hr>

                        <div class=" d-flex justify-content-center">
                            <div class="box-header"><h5> Berilgan Huquqlar </h5></div><br>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active uz-form">
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        <label class="label label-success">{{ $v->name }}</label>
                                    @endforeach
                                 @endif
                            </div>
                        </div> <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
