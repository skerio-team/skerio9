@extends('layouts.admin')

@section('content')

    <div class="col-md-9">

        <!-- general form elements -->
        <div>
            <a href="{{ route('admin.productCategories.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a><br><br>
        </div>
        <div class="card card-primary">

          <div class="card-header">
            <h3 class="card-title">Mahsulot Kategoriyasini yaratish</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form action="{{route('admin.productCategories.store')}}" method="post">
             @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Nomi (UZ)</label>
                    <input type="text" class="form-control" placeholder="Nomini kiriting" name="uz[name]"  value="{{ old('uz.name') }}">
                    @error('uz.name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nomi(RU)</label>
                    <input type="text" class="form-control" placeholder="Nomini kiriting" name="ru[name]" value="{{ old('ru.name') }}">
                    @error('ru.name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nomi(EN)</label>
                    <input type="text" class="form-control" placeholder="Nomini kiriting" name="en[name]" value="{{ old('en.name') }}">
                    @error('en.name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
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
