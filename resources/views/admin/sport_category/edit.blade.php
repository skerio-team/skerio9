@extends('layouts.admin')

@section('content')

    <div class="col-md-9">

        <!-- general form elements -->
        <div>
            <a href="{{ route('admin.categories.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a><br><br>
        </div>
        <div class="card card-primary">

          <div class="card-header">
            <h3 class="card-title">Sport Kategoriyasini Tahrirlash</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form action="{{route('admin.categories.update', $item->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label>Nomi(UZ)</label>
                <input type="text" class="form-control" placeholder="Nomini kiriting" name="uz[name]"  value="{{ $item->translate('uz')->name }}" >
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nomi(RU)</label>
                <input type="text" class="form-control" placeholder="Nomini kiriting" name="ru[name]"  value="{{ $item->translate('ru')->name }}" >
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nomi(EN)</label>
                <input type="text" class="form-control" placeholder="Nomini kiriting" name="en[name]"  value="{{ $item->translate('en')->name }}" >
              </div>
            </div>

            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tasdiqlash</button>
            </div>
          </form>


        </div>
        <!-- /.card -->
    </div>
@endsection