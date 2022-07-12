@extends('layouts.admin')

@section('content')
    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15"> Mahsulotlar soni </h5>
                                    <h2 class="mb-3 font-18"> {{ $products }}</h2>
                                    <p class="mb-0">Bugun @if($countTodayProduct==0) mahsulot qo'shilmadi </p> @else <span class="col-green">{{ ' '.$countTodayProduct }}</span>&nbsp;ta qo'shildi @endif  </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                     <img src="/assets/img/banner/2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15"> Sport Kategoriyalari soni </h5>
                                    <h2 class="mb-3 font-18"> {{ $categories->count() }} </h2>
                                    <p class="mb-0">Bugun @if($countSC==0) sport kategoriya qo'shilmadi </p> @else <span class="col-green">{{ ' '.$countSC }}</span>&nbsp;ta qo'shildi @endif  </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="/assets/img/banner/1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Yangiliklar soni</h5>
                                    <h2 class="mb-3 font-18"> {{ $news->count() }} </h2>
                                    <p class="mb-0">Bugun @if($countNews==0) yangilik qo'shilmadi </p> @else <span class="col-green">{{ ' '.$countNews }}</span>&nbsp;ta qo'shildi @endif  </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="/assets/img/banner/321.png" style="height: 140px !important" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15"> Foydalanuvchilar </h5>
                                    <h2 class="mb-3 font-18"> {{ $users->count() }} </h2>
                                    <p class="mb-0">Bugun @if($countTodayUser==0) ro'yxatdan o'tilmadi </p> @else <span class="col-green">{{ ' '.$countTodayUser }}</span>&nbsp;ta qo'shildi @endif </p>
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="/assets/img/banner/5.png" alt="" style="height: 140px !important">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered table-md">
                  <tr>
                    <th>#</th>
                    <th> Sayt tarkibi </th>
                    <th> Ma'lumotlar soni </th>
                    <th style="width: 100px"> Tanlangan sahifaga o'tish  </th>
                  </tr>

                  <tr>
                     <td> 1 </td>
                     <td> Bosh sahifadagi ma'lumot </td>
                     <td> {{ $homes }} </td>
                     <td>
                       <a href=" {{ route('admin.homes.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                     <td> 2 </td>
                     <td> Brend </td>
                     <td> {{ $brands }} </td>
                     <td>
                       <a href="{{ route('admin.brands.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                     <td> 3 </td>
                     <td> Mahsulot kategoriyasi </td>
                     <td> {{ $productCategories->count() }} </td>
                     <td>
                       <a href="{{ route('admin.productCategories.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                     <td> 4 </td>
                     <td> Mahsulot o`lchamlari </td>
                     <td> {{ $sizes->count() }} </td>
                     <td>
                       <a href="{{ route('admin.sizes.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                     <td> 5 </td>
                     <td> Jamoalar </td>
                     <td> {{ $teams->count() }} </td>
                     <td>
                       <a href="{{ route('admin.team.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                    <td> 6</td>
                     <td> Sport Majmualar </td>
                     <td> {{ $sportComplexes->count() }} </td>
                     <td>
                       <a href="{{ route('admin.complexes.table.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                    <td> 7 </td>
                     <td> Chiptalar </td>
                     <td> {{ $tickets->count() }} </td>
                     <td>
                       <a href="{{ route('admin.tickets.table.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>

                  <tr>
                    <td> 8 </td>
                     <td> Stadionlar </td>
                     <td> {{ $stadiums->count() }} </td>
                     <td>
                       <a href="{{ route('admin.tickets.stadiums.table.index') }} "><button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                     </td>
                  </tr>



                </table>
              </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex justify-content-right pagination">
                    {{-- {!! $items->links() !!} --}}
                </div>
              </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon l-bg-purple">
              <i class="fas fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
              <div class="padding-20">
                <div class="text-right">
                  <h3 class="font-light mb-0">
                    <i class="ti-arrow-up text-success"></i> 50
                  </h3>
                  <span class="text-muted"> Jami sotilgan mahsulotlar </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon l-bg-green">
              <i class="fas fa-hiking"></i>
            </div>
            <div class="card-wrap">
              <div class="padding-20">
                <div class="text-right">
                  <h3 class="font-light mb-0">
                    <i class="ti-arrow-up text-success"></i> 10
                  </h3>
                  <span class="text-muted"> Sotib olgan mijozlar </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon l-bg-cyan">
              <i class="fas fa-chart-line"></i>
            </div>
            <div class="card-wrap">
              <div class="padding-20">
                <div class="text-right">
                  <h3 class="font-light mb-0">
                    <i class="ti-arrow-up text-success"></i> {{ $orders->count() }}
                  </h3>
                  <span class="text-muted"> Buyurtmalar </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon l-bg-orange">
              <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
              <div class="padding-20">
                <div class="text-right">
                  <h3 class="font-light mb-0">
                    <i class="ti-arrow-up text-success"></i> $5,263
                  </h3>
                  <span class="text-muted"> Jami sotilgan mahsulotlarning narxi </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
