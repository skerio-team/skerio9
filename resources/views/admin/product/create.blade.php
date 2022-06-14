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
                        <h4> Mahsulot qo'shish </h4>
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
                <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body " >

                        <div id="uz-form" >
                            <div class="form-group ">
                                <label>Tavsif(UZ) </label>
                                <input type="text" class="form-control " placeholder="Tavsifni kiriting" name="uz[description]" >
                            </div>
                        </div>

                        <div id="ru-form" class="d-none">
                            <div class="form-group ">
                                <label>Tavsif(RU)</label>
                                <input type="text" class="form-control" placeholder="Tavsifni kiriting" name="ru[description]" >
                            </div>
                        </div>

                        <div id="en-form" class="d-none">
                            <div class="form-group ">
                                <label>Tavsif(EN)</label>
                                <input type="text" class="form-control" placeholder="Tavsifni kiriting" name="en[description]" >
                            </div>
                        </div>

                        <div class="form-group ">
                            <label>Nom</label>
                            <input type="text" class="form-control" placeholder="Nomni kiriting" name="name" >
                        </div>

                        <div class="form-group ">
                            <label class="">Rasm</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Rasm</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Chegirma(Majburiy emas)</label>
                            <input type="number" class="form-control" placeholder="Chegirma bo'lsa kiriting" name="discount" >
                        </div>

                        <div class="form-group">
                            <label>Narx</label>
                            <input type="number" class="form-control" placeholder="Narxni kiriting" name="price" >
                        </div>

                        <div class="form-group ">
                            <label>Raqamli O'lchamlarga biriktirish</label>
                            <select name="size_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="O'lchamlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach ($sizes as $size )
                                    <option value="{{$size->id}}">{{$size->number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Harfli O'lchamlarga biriktirish</label>
                            <select name="size_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="O'lchamlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                @foreach ($sizes as $size )
                                    <option value="{{$size->id}}">{{ $size->letter}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Sport Kategoriyasiga biriktirish</label>
                            <select name="sport_category_id" class="form-control"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                <option value="0"> </option>
                                @foreach ($sport_categories as $category )
                                    <option value="{{$category->id}}">{{$category->translate('uz')->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Mahsulot Kategoriyasiga biriktirish</label>
                            <select name="product_category_id" class="form-control"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true">
                                <option value="0"> </option>
                                @foreach ($product_categories as $category )
                                    <option value="{{$category->id}}">{{$category->translate('uz')->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Brendga biriktirish</label>
                            <select name="brand_id" class="form-control"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                <option value="0"> </option>
                                @foreach ($brands as $brand )
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Jamoga biriktirish</label>
                            <select name="team_id" class="form-control"  data-placeholder="Jamoaga biriktirish tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                <option value="0"> </option>
                                @foreach ($teams as $team )
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="">Status</label>
                            <select name="status" class="form-control  select2 select2-hidden-accessible" id="">
                                <option value="1">Faol</option>
                                <option value="0">Faol emas</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Meta Nomi(title)</label>
                            <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" >
                        </div>

                        <div class="form-group ">
                            <label>Meta Nomi(description)</label>
                            <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" >
                        </div>

                        <div class="form-group ">
                            <label>Meta kalitso'z (keywords)</label>
                            <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" >
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
