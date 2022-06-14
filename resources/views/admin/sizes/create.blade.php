@extends('layouts.admin')

@section('content')

    <div class="col-md-9">

        <!-- general form elements -->
        <div>
            <a href="{{ route('admin.sizes.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a><br><br>
        </div>
        <div class="card card-primary">

          <div class="card-header">
            <h3 class="card-title">O'lcham yaratish</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form action="{{route('admin.sizes.store')}}" method="post">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label>Raqam</label>
                <input type="number" class="form-control" placeholder="Raqam kiriting" name="number" value="{{ old('number') }}" >
                @error('number')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Harf</label>
                <input type="text" class="form-control" placeholder="Harf kiriting" name="letter" value="{{ old('letter') }}">
                @error('letter')
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
