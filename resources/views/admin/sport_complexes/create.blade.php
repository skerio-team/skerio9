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

                    <div class="card-header col-sm-6 d-flex justify-content-between">
                        <a href="{{ route('admin.complexes.table.index') }}"><button class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a>
                        
                        <h3> Majmua qo'shish</h3>
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
                  <form action="{{ route('admin.complexes.table.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">

                        <div class="row">
                            <div class="col-sm-4 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label>Kategoriyaga biriktirish</label>
                                    <select name="sport_category_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0">Categoriyani tanlang</option>
                                        @foreach ($categories as $category )
                                            <option value="{{$category->id}}">{{$category->translate('uz')->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label>Hududga biriktirish</label>
                                    <select name="area_id" class="form-control select2 select2-hidden-accessible"  data-placeholder="Kategoriyalarni tanlang" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="0">Hududni tanlang</option>
                                        @foreach ($areas as $area )
                                            <option value="{{$area->id}}">{{$area->name}} [{{ $area->regions['name'] }}, {{ $area->regions->countries['country'] }}]</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group ">
                                    <label class="">Rasm</label>
        
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Rasm</label>
                                        <input type="file" name="image[]" id="image-upload" multiple />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7 col-md-8 col-lg-8">
                                <div class="row">
                                    <div class="col-sm-4 col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <label >Majmua Nomi</label>
                                            <input type="text" class="form-control " placeholder="Nomini kiriting" name="name" >
                                        </div>
        
                                        <div class="form-group ">
                                            <label>Manzil</label>
                                            <input type="text" class="form-control" placeholder="Majmuaning manzili" name="address">
                                        </div>

                                        <div class="form-group ">
                                            <label >Majmua geolakatsiyasi</label>
                                            <input type="text" class="form-control " placeholder="Geolakatsiyani kiriting" name="location" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-6 col-lg-6">
                                        <div class="form-group ">
                                            <label>Telefon Raqami</label>
                                            <input type="text" class="form-control" placeholder="+99812345678" name="phone">
                                        </div>
    
                                        <div class="form-group ">
                                            <label>Majmua Narxi (1 soat uchun)</label>
                                            <input type="number" class="form-control" placeholder="Majmua narxini kiriting" name="price" >
                                        </div>

                                        <div class="form-group ">
                                            <label for="">Majmua ishlash holati</label>
                                            <select name="working_status" class="form-control select2 select2-hidden-accessible" id="">
                                                <option value="1">Ochiq majmua</option>
                                                <option value="0">Yopiq majmua</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="">Ovqatlanish joyi</label>
                                    <select name="food" class="form-control select2 select2-hidden-accessible" id="">
                                        <option value="1">Mavjud</option>
                                        <option value="0">Mavjud emas</option>
                                    </select>
                                </div>
        
                                <div class="form-group ">
                                    <label for="">Kiyinish xonasi</label>
                                    <select name="dress_room" class="form-control select2 select2-hidden-accessible" id="">
                                        <option value="1">Mavjud</option>
                                        <option value="0">Mavjud emas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label for="">Yuvunish xonasi</label>
                                    <select name="bath_room" class="form-control select2 select2-hidden-accessible" id="">
                                        <option value="1">Mavjud</option>
                                        <option value="0">Mavjud emas</option>
                                    </select>
                                  </div>
        
                                  <div class="form-group ">
                                    <label for="">Tribuna</label>
                                    <select name="sit_place" class="form-control select2 select2-hidden-accessible" id="">
                                        <option value="1">Mavjud</option>
                                        <option value="0">Mavjud emas</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-6 col-lg-6">
                                <div id="uz-form" >
                                    <div class="form-group ">
                                        <label>Tavsif(UZ)</label>
                                        <textarea name="uz[description]" id="" cols="30" rows="10">  </textarea>
                                    </div>
                                </div>
        
                                <div id="ru-form" class="d-none">
                                    <div class="form-group ">
                                        <label>Tavsif(RU)</label>
                                        <textarea name="ru[description]" id="" cols="30" rows="10">  </textarea>
                                    </div>
                                </div>
        
                                <div id="en-form" class="d-none">
                                    <div class="form-group ">
                                        <label>Tavsif(EN)</label>
                                        <textarea name="en[description]" id="" cols="30" rows="10">  </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-6 col-lg-6">
                                <div class="form-group ">
                                    <label>Meta kalitso'z (tag)</label>
                                    <input type="text" class="form-control" placeholder="Meta Kalitso'zni kiriting" name="meta_tag" >
                                </div>

                                <div class="form-group ">
                                    <label>Meta sarlovha(title)</label>
                                    <input type="text" class="form-control" placeholder="Meta Sarlovhani kiriting" name="meta_title" >
                                </div>
        
                                <div class="form-group ">
                                    <label>Meta tavsif(description)</label>
                                    <input type="text" class="form-control" placeholder="Meta Tavsifni kiriting" name="meta_description" >
                                </div>

                                <div class="form-group ">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control select2 select2-hidden-accessible" id="">
                                        <option value="1">Faol</option>
                                        <option value="0">Faol emas</option>
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