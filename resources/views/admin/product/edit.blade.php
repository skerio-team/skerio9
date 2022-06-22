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
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <a href="{{ route('admin.products.store') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }} </button></a>

                        <h4> Mahsulotni tahrirlash </h4>

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
                <form action="{{route('admin.products.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Sport Kategoriyasiga biriktirish</label>
                                    <select name="sport_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            <option value="0"> - </option>
                                        @foreach ($sport_categories as $category )
                                            <option value="{{$category->id}}" {{ $category->id == $item->sport_category_id ? 'selected' : '' }} >{{$category->translate('uz')->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Mahsulot Kategoriyasiga biriktirish</label>
                                    <select name="product_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            <option value="0"> - </option>
                                        @foreach ($product_categories as $category )
                                            <option value="{{$category->id}}" {{ $category->id == $item->product_category_id ? 'selected' : '' }} >{{$category->translate('uz')->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Brendga biriktirish</label>
                                    <select name="brand_id" class="form-control"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> - </option>
                                        @foreach ($brands as $brand )
                                            <option value="{{$brand->id}}" {{ $brand->id == $item->brand_id ? 'selected' : '' }}>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3 col-lg-3">
                                <div class="form-group ">
                                    <label>Jamoaga biriktirish</label>
                                    <select name="team_id" class="form-control"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0"> - </option>
                                        @foreach ($teams as $team )
                                            <option value="{{$team->id}}" {{ $team->id == $item->team_id ? 'selected' : '' }}>{{$team->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group ">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" placeholder="Nomni kiriting" name="name" value="{{ $item->name }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">                
                                        <div class="form-group">
                                            <label>Narx</label>
                                            <input type="number" class="form-control" placeholder="Narxni kiriting" name="price" value="{{ $item->price }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Chegirma(Majburiy emas)</label>
                                            <input type="number" class="form-control" placeholder="Chegirma bo'lsa kiriting" name="discount" value="{{ $item->discount }}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <label class="">Rasm</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Rasm</label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>Raqamli Mahsulot O'lchamiga biriktirish</label>
                                                    <select name="size_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="o'lchamlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                        <option value="0">Hech qaysi</option>
                                                        @foreach ($numbers as $n )
                                                            <option
                                                                @foreach($item->sizes as $item_size)
                                                                    @if ($item_size->number == $n->number) selected @endif
                                                                @endforeach
                                                                value="{{$n->id}}"> {{$n->number}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group ">
                                                    <label>Harfli Mahsulot O'lchamiga biriktirish</label>
                                                    <select name="size_id[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="o'lchamlarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                        <option value="0">Hech qaysi</option>
                                                        @foreach ($letters as $l )
                                                            <option
                                                                @foreach($item->sizes as $item_size)
                                                                    @if ($item_size->letter==$l->letter) selected @endif
                                                                @endforeach
                                                                value="{{$l->id}}">  {{ $l->letter }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div id="uz-form" >
                                            <div class="form-group ">
                                                <label>Tavsif(UZ) </label>
                                                <textarea name="uz[description]" id="" cols="30" rows="10"> {{ $item->translate('uz')->description }} </textarea>
                                            </div>
                                        </div>
                
                                        <div id="ru-form" class="d-none">
                                            <div class="form-group ">
                                                <label>Tavsif(RU)</label>
                                                <textarea name="ru[description]" id="" cols="30" rows="10"> {{ $item->translate('ru')->description }} </textarea>
                                            </div>
                                        </div>
                
                                        <div id="en-form" class="d-none">
                                            <div class="form-group ">
                                                <label>Tavsif(EN)</label>
                                                <textarea name="en[description]" id="" cols="30" rows="10"> {{ $item->translate('en')->description }} </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="">Status</label>
                            <select name="status" class="form-control" id="">
                                <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : " " }}>Faol</option>
                                <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : " " }}>Faol emas</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label>Meta Nomi(title)</label>
                            <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" value="{{ old('meta_title',$item->meta_title) }}">
                        </div>

                        <div class="form-group ">
                            <label>Meta Nomi(description)</label>
                            <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" value="{{ old('meta_description',$item->meta_description) }}">
                        </div>

                        <div class="form-group ">
                            <label>Meta kalitso'z (keywords)</label>
                            <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_keywords" value="{{ old('meta_keywords',$item->meta_keywords) }}">
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button class="btn btn-primary"> {{ __("Saqlash") }} </button>
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
