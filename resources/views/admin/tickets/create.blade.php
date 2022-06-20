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
            <div class="col-sm-6 col-md-12 col-lg-12">
              <div class="card">
                  <div class="row mb-2">

                    <div class="card-header col-sm-12 col-md-12 d-flex justify-content-between">
                        <a href="{{ route('admin.tickets.table.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>

                        <h3> Chipta qo'shish</h3>

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
                  <form action="{{ route('admin.tickets.table.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="">Rasm</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Rasm</label>
                                        <input type="file" name="image[]" id="image-upload" multiple />
                                    </div>
                                    @error('image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group ">
                                            <label>Kategoriyaga biriktirish</label>
                                            <select name="sport_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                <option value=" ">Kategoriyani tanlang</option>
                                                @foreach ($categories as $category )
                                                    <option {{ old('sport_category_id') == $category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->translate('uz')->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('sport_category_id')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="row">                                    
                                    <div class="col-md-6 col-lg-6">
        

                                        <div class="form-group ">
                                            <label >Nomi</label>
                                            <input type="text" class="form-control" placeholder="Chipta nomini kiriting" name="name" >
                                        </div>

                                        <div class="form-group ">
                                            <label>Jamoaga biriktirish</label>

                                            <select name="team_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                <option value=" ">Jamoaga tanlang</option>

                                                @foreach ($teams as $team )
                                                    <option {{ old('team_id') == $team->id ? 'selected' : '' }} value="{{$team->id}}"> {{$team->name}} </option>
                                                @endforeach
                                            </select>
                                            @error('team_id')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label>Stadion sektoriga biriktirish</label>
                                            <select name="stadium_section_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                <option value=" ">Sektor tanlang</option>
                                                @foreach ($stadium_sections as $section )
                                                    <option {{ old('stadium_section_id') == $section->id ? 'selected' : '' }} value="{{$section->id}}"> {{$section->name}} [{{$section->stadiums->name}}]</option>
                                                @endforeach
                                            </select>
                                            @error('stadium_section_id')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6">

                                        <div class="form-group ">
                                            <label >Nomi</label>
                                            <input type="text" class="form-control " placeholder="Chipta nomini kiriting" name="name" value="{{ old('name') }}" >
                                            @error('name')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label>Sana</label>
                                            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') }}">
                                            @error('date')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label>Narxi (1 kishi uchun)</label>
                                            <input type="number" class="form-control" placeholder="Chipta narxini kiriting" name="price" value="{{ old('price') }}">
                                            @error('price')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div id="uz-form" >
                                    <div class="form-group ">
                                        <label>Tavsif(UZ)</label>
                                        <textarea name="uz[description]" id="" cols="30" rows="10"> {!! old('uz.description') !!} </textarea>
                                        @error('uz.description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div id="ru-form" class="d-none">
                                    <div class="form-group ">
                                        <label>Tavsif(RU)</label>
                                        <textarea name="ru[description]" id="" cols="30" rows="10"> {!! old('ru.description') !!} </textarea>
                                        @error('ru.description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div id="en-form" class="d-none">
                                    <div class="form-group ">
                                        <label>Tavsif(EN)</label>
                                        <textarea name="en[description]" id="" cols="30" rows="10"> {!! old('en.description') !!} </textarea>
                                        @error('en.description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Meta kalitso'z (tag)</label>
                                    <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_tag" value="{{ old('meta_tag') }}">
                                </div>

                                <div class="form-group ">
                                    <label>Meta sarlovha(title)</label>
                                    <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ old('meta_title') }}" >
                                </div>

                                <div class="form-group ">
                                    <label>Meta tavsif(description)</label>
                                    <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ old('meta_description') }}">
                                </div>

                                <div class="form-group ">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control select2 select2-hidden-accessible" id="status">
                                        <option {{ old('status') == '1' ? 'selected' : '' }} value="1">Faol</option>
                                        <option {{ old('status') == '0' ? 'selected' : '' }} value="0">Faol emas</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Tasdiqlash</button>
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
