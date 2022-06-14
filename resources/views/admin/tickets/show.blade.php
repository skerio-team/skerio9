@extends('layouts.admin')

@section('css')
        <link rel="stylesheet" href="/assets/bundles/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="/assets/bundles/codemirror/lib/codemirror.css">
        <link rel="stylesheet" href="/assets/bundles/codemirror/theme/duotone-dark.css">
    <style>

        .bg-aqua-active{

            background-color: #6777ef;
            border-color: transparent !important;
            color: #fff !important;

        }

    </style>
@endsection

    @section('content')
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card"> <br>
                            <div class="row mb-2">
                                <div class="card-header col-sm-6">

                                    <div class=" d-flex justify-content-center">

                                        <a href="{{ route('admin.tickets.table.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ __("Ortga") }}</button></a> &nbsp;
                                        <a href="{{ route('admin.tickets.table.edit', $item->id) }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i> {{ __("Tahrirlash") }}</button></a> &nbsp;

                                        <form action="{{route('admin.tickets.table.destroy', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  style="display: inline" type="submit" class="btn btn-danger btn-sm  ">
                                                <i class="fas fa-trash-alt"  aria-hidden="true"></i>
                                                {{ __("O'chirish") }}
                                            </button>
                                        </form>

                                    </div>
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
                                            <a class="nav-link" href="#" id="en-link">EN</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">                             
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-5">
                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Birikkan jamoa va [Kategoriya] </h5></div>

                                            <div class="tab-content">
                                                <div class="tab-pane active uz-form">
                                                    <h6> {{ $item->teams->name }} [{!! $item->sportCategories->translate('uz')->name !!}]  </h6>
                                                </div>
                                                <div class="tab-pane active en-form d-none">
                                                    <h6> {{ $item->teams->name }} [{!! $item->sportCategories->translate('en')->name !!}]  </h6>
                                                </div>
                                                <div class="tab-pane active ru-form d-none">
                                                    <h6> {{ $item->teams->name }} [{!! $item->sportCategories->translate('ru')->name !!}]  </h6>
                                                </div>
                                            </div>
                                        </div> <hr>

                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Nomi </h5></div>
        
                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6> {!! $item->name !!} </h6>
                                                </div>
                                            </div>
                                        </div> <hr>

                                        <div  class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Sana </h5></div>
    
                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6> {{ $item->date }} </h6>
                                                </div>
                                            </div>
                                        </div> <hr>

                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Narxi </h5></div>

                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6> {!! number_format($item->price) !!} </h6>
                                                </div>
                                            </div>
                                        </div> <hr>

                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Tavsif</h5></div>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active uz-form">
                                                    <h6 class="text-justify"> {!! $item->translate('uz')->description !!} </h6>
                                                </div>
                                                <div class="tab-pane active en-form d-none">
                                                    <h6 class="text-justify"> {!! $item->translate('en')->description !!} </h6>
                                                </div>
                                                <div class="tab-pane active ru-form d-none">
                                                    <h6 class="text-justify"> {!! $item->translate('ru')->description !!} </h6>
                                                </div>
                                            </div>
                                        </div> <hr>

                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Meta sarlovha </h5></div>

                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6>  {{ $item->meta_title }}  </h6>
                                                </div>
                                            </div>
                                        </div> <hr>
                                        
                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Meta tavsif </h5></div>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6>  {{ $item->meta_description }}  </h6>
                                                </div>
                                            </div>
                                        </div> <hr>

                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Meta kalitso'z (tag) </h5></div>
                                            
                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6>  {{ $item->meta_tag }}  </h6>
                                                </div>
                                            </div>
                                        </div> <hr>
                                        
                                        <div class=" d-flex justify-content-between">
                                            <div class="box-header"><h5> Status </h5></div>

                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <h6>
                                                        @if($item->status == 1)
                                                            <h6 class="badge badge-success">Faol</h6>
                                                        @else
                                                            <h6 class="badge badge-danger">Faol emas</h6>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-5">

                                        <div class=" d-flex justify-content-center">
                                            <div class="box-header"><h2> Rasmi </h2></div>
                                        </div>

                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                @if (!empty($item->image))
                                                    @php
                                                        $images=explode("|", $item->image);
                                                    @endphp
                                                    
                                                    @foreach ($images as $img)
                                                        <img src="/admin/images/tickets/{{ $img }}" width="80%"> <hr>
                                                    @endforeach
                                                @else 
                                                    <h5 class="text-danger"> Rasm mavjud emas! </h5>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

@section('scripts')
    <script>
        var $uzForm = $('.uz-form');
        var $ozForm = $('.en-form');
        var $ruForm = $('.ru-form');
        var $uzLink = $('#uz-link');
        var $ruLink = $('#ru-link');
        var $ozLink = $('#en-link');


        $uzLink.click(function() {
            $uzLink.addClass('bg-aqua-active');
            $uzForm.removeClass('d-none');
            $ruLink.removeClass('bg-aqua-active');
            $ruForm.addClass('d-none');
            $ozLink.removeClass('bg-aqua-active');
            $ozForm.addClass('d-none');

        });

        $ruLink.click(function() {
            $ruLink.addClass('bg-aqua-active');
            $ruForm.removeClass('d-none');
            $uzLink.removeClass('bg-aqua-active');
            $uzForm.addClass('d-none');
            $ozLink.removeClass('bg-aqua-active');
            $ozForm.addClass('d-none');
        });
        $ozLink.click(function() {
            $ozLink.addClass('bg-aqua-active');
            $ozForm.removeClass('d-none');
            $uzLink.removeClass('bg-aqua-active');
            $uzForm.addClass('d-none');
            $ruLink.removeClass('bg-aqua-active');
            $ruForm.addClass('d-none');
        });
    </script>
@endsection
