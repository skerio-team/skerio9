@extends('layouts.admin')

@section('content')

    <div class="col-md-9">

        <!-- general form elements -->
        <div>
            <a href="{{ route('admin.brands.index') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Ortga</button></a><br><br>
        </div>
        <div class="card card-primary">

          <div class="card-header">
            <h3 class="card-title">Brend yaratish</h3>
          </div>
          <!-- /.card-header -->

          <!-- form start -->
          <form action="{{route('admin.brands.update', $item->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="card-body">

                <div class="form-group">
                    <label>Nomi</label>
                    <input type="text" class="form-control" placeholder="Nomini kiriting" name="name"  value="{{ old('name', $item->name) }}">
                     @error('name')
                      <div class="alert alert-danger">
                          {{ $message }}
                      </div>
                     @enderror
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
