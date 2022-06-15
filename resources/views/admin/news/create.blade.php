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

    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="row mb-2">
                    <div class="card-header col-sm-6">
                        <h4> Yangilik yaratish</h4>
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
                <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body " >

                        <div id="uz-form" >
                            <div class="form-group ">
                                <label >Sarlovha(UZ)</label>
                                <input type="text" class="form-control " placeholder="Sarlovhani kiriting" name="uz[title]" value="{{ old('uz.title') }}">
                                @error('uz.title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group ">
                                <label>Tavsif(UZ)</label>
                                <textarea name="uz[description]" id="" cols="30" rows="10"> {{ old('uz.description') }} </textarea>
                                @error('uz.description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div id="ru-form" class="d-none">
                            <div class="form-group ">
                                <label>Sarlovha(RU)</label>
                                <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="ru[title]" value="{{ old('ru.title') }}">
                                @error('ru.title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label>Tavsif(RU)</label>
                                <textarea name="ru[description]" id="" cols="30" rows="10"> {{ old('ru.description') }} </textarea>
                                @error('ru.description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div id="en-form" class="d-none">
                            <div class="form-group ">
                                <label>Sarlovha(EN)</label>
                                <input type="text" class="form-control" placeholder="Sarlovhani kiriting" name="en[title]" value="{{ old('en.title') }}">
                                @error('en.title')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group ">
                                <label>Tavsif(EN)</label>
                                <textarea name="en[description]" id="" cols="30" rows="10"> {{ old('en.description') }} </textarea>
                                @error('en.description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group ">
                            <label class="">Rasm</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Rasm</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label>Sport Kategoriyaga biriktirish</label>
                            <select name="sport_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach ($categories as $category )
                                    <option value="{{$category->id}}" {{ old('sport_category_id' ) == $category->id ? 'selected' : '' }}>{{$category->translate('uz')->name}}</option>
                                @endforeach
                                <option value="0"> </option>
                            </select>
                            @error('sport_category_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="">Status</label>
                            <select name="status" class="form-control  select2 select2-hidden-accessible" id="">
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }} >Faol emas</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Faol</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for=""> Maxsus </label>
                            <select name="special" class="form-control  select2 select2-hidden-accessible" id="">
                                <option value="0"  {{ old('special') == '0' ? 'selected' : '' }}>yo'q</option>
                                <option value="1"  {{ old('special') == '1' ? 'selected' : '' }}>ha</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Meta sarlovha(title)</label>
                            <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ old('meta_title') }}">
                        </div>

                        <div class="form-group ">
                            <label>Meta tavsif(description)</label>
                            <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ old('meta_description') }}">
                        </div>

                        <div class="form-group ">
                            <label>Meta kalitso'z (keywords)</label>
                            <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" value="{{ old('meta_keywords') }}">
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button class="btn btn-primary">Tasdiqlash</button>
                            </div>
                        </div>
                    </div>
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
    <script src="/assets/js/page/create-post.js"></script>


    <script>
        $(function () {

            $('.select2').select2()
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
