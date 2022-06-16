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
                                <a href="{{ route('admin.users.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a> &nbsp;
                                @can('user-edit')
                                    <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> Tahrirlash</button></a> &nbsp;
                                @endcan

                                @can('user-delete')
                                    <form action="{{route('admin.users.destroy', $user->id)}}" method="post">
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
                            <div class="box-header"><h5> Ismi </h5></div><br>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active uz-form">
                                <h6> {{$user->name}} </h6>
                            </div>
                        </div> <hr>

                        <div class=" d-flex justify-content-center">
                            <div class="box-header"><h5> Email </h5></div><br>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active uz-form">
                                <h6> {{$user->email}} </h6>
                            </div>
                        </div> <hr>

                        <div class=" d-flex justify-content-center">
                            <div class="box-header"><h5> Vazifa & Huquq </h5></div><br>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active uz-form">
                                 @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                @else
                                      Oddiy foydalanuvchi
                                @endif
                            </div>
                        </div> <hr>

                        @if(!empty($user->getPermissionNames()))
                        <div class=" d-flex justify-content-center">
                            <div class="box-header"><h5> Berilgan Vazifalar </h5></div><br>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active uz-form">
                                @foreach($user->getPermissionNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            </div>
                            </div> <hr>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
