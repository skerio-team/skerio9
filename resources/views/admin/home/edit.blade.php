@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
    <style>
        .bg-aqua-active{

            background-color: #6777ef;
            border-color: transparent !important;
            color: #fff !important;

        }
    </style>
     <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
     <link rel="stylesheet" href="/assets/bundles/codemirror/lib/codemirror.css">
     <link rel="stylesheet" href="/assets/bundles/codemirror/theme/duotone-dark.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('admin.homes.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a> &nbsp;


                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Bosh menyu</a></li>
                        <li class="breadcrumb-item active">Tahrirlash</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row mb-2">
                            <div class="card-header col-sm-6">
                                <h4>{{ $item->id }} -raqamli ma`lumotni tahrirlash</h4>
                            </div>
                            <div class="col-sm-6">
                                <ul class="nav nav-tabs float-sm-right " >
                                    <li class="nav-item">
                                        <a class="nav-link " href="#" id="ru-link">Ru</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link bg-aqua-active" href="#" id="uz-link">Uzb</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" id="en-link">En</a>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                        <form action="{{route('admin.homes.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body " >

                                <div id="uz-form" >
                                    <div class="form-group">
                                        <label>Sarlovha(UZ)</label>
                                        <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="uz[title]" value="{{ $item->translate('uz')->title }}" >
                                    </div>

                                    <div class="form-group">
                                        <label>Tavsif(UZ)</label>
                                        <input type="text" class="form-control" placeholder="Tavsifni kiriting" name="uz[description]" value="{{ $item->translate('uz')->description }}" >
                                    </div>
                                </div>

                                <div id="ru-form" class="d-none">
                                    <div class="form-group">
                                        <label>Sarlovha(RU)</label>
                                        <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title]" value="{{ $item->translate('ru')->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Tavsif(RU)</label>
                                        <input type="text" class="form-control" placeholder="Tavsifni kiriting" name="ru[description]" value="{{ $item->translate('ru')->description }}">
                                    </div>
                                </div>

                                <div id="en-form" class="d-none">
                                    <div class="form-group">
                                        <label>Sarlovha(EN)</label>
                                        <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="en[title]" value="{{ $item->translate('en')->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Tavsif(EN)</label>
                                        <input type="text" class="form-control" placeholder="Tavsifni kiriting" name="en[description]" value="{{ $item->translate('en')->description }}">
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label class="">Rasm</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Rasm</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Meta sarlovha (title)</label>
                                    <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ $item->meta_title }}">
                                </div>

                                <div class="form-group">
                                    <label>Meta tavsif(description)</label>
                                    <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_description" value="{{ $item->meta_description }}" >
                                </div>

                                <div class="form-group">
                                    <label>Meta kalitso'z (keywords)</label>
                                    <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_keywords" value="{{ $item->meta_keywords }}" >
                                </div>

                            </div>
                                <!-- /.card-body -->
                            @can('home-edit')
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tasdiqlash</button>
                                </div>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src={{ asset('ckeditor/ckeditor.js')}}></script>
    <script src="{{ asset('ckeditor/adapters/jquery.js')}}"></script>

    <script src="/assets/bundles/summernote/summernote-bs4.js"></script>
    <script src="/assets/bundles/codemirror/lib/codemirror.js"></script>
    <script src="/assets/bundles/codemirror/mode/javascript/javascript.js"></script>


    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/create-item.js"></script>


    <script>
        $(function () {

         //Initialize Select2 Elements
             $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        })

         $('textarea').addClass('summernote')

    </script>
    <script>
        var $uzForm = $('#uz-form');
        var $uzLink = $('#uz-link');
        var $ruForm = $('#ru-form');
        var $ruLink = $('#ru-link');
        var $enLink = $('#en-link');
        var $enForm = $('#en-form');

        $uzLink.click(function() {
            $uzLink.addClass('bg-aqua-active');
            $uzForm.removeClass('d-none');
            $ruLink.removeClass('bg-aqua-active');
            $ruForm.addClass('d-none');
            $enLink.removeClass('bg-aqua-active');
            $enForm.addClass('d-none');
        });

        $ruLink.click(function() {
            $ruLink.addClass('bg-aqua-active');
            $ruForm.removeClass('d-none');
            $uzLink.removeClass('bg-aqua-active');
            $uzForm.addClass('d-none');
            $enLink.removeClass('bg-aqua-active');
            $enForm.addClass('d-none');
        });
        $enLink.click(function() {
            $enLink.addClass('bg-aqua-active');
            $enForm.removeClass('d-none');
            $uzLink.removeClass('bg-aqua-active');
            $uzForm.addClass('d-none');
            $ruLink.removeClass('bg-aqua-active');
            $ruForm.addClass('d-none');
        });
    </script>
@endsection
