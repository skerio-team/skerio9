@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/select2/dist/css/select2.min.css') }}">
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
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Ooh!</strong> Xatolik mavjud! <br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                        @else
                        <h4> Foydalanuvchi yaratish </h4>
                        @endif
                    </div>

                </div>
                <form action="{{route('admin.users.store')}}" method="post">
                    @csrf
                    <div class="card-body">

                      <div class="form-group">
                        <label> Ismi </label>
                        <input type="text" class="form-control" placeholder="Ismini kiriting" value="" name="name" required >
                      </div>

                      <div class="form-group">
                        <label> Email </label>
                        <input type="email" class="form-control" placeholder="Elektron-pochtani kiriting" value=" " name="email" required >
                      </div>

                      <div class="form-group">
                        <label> Parol </label>
                        <input type="password" id="password" class="form-control" placeholder="Parolni kiriting" value="" name="password" required >
                      </div>

                      <div class="form-group">
                        <label> Parolni tasdiqlash </label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Parolni kiriting" required >
                      </div>

                       <div class="form-group ">
                            <label>Rollarni tanlang</label>
                            <select name="roles[]" class="form-control select2 " multiple>
                                @foreach ($roles as $role )
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                       {{-- <div class="form-group ">
                            <label>Huquq tanlang</label>
                            <select name="permission[]" class="form-control select2 " multiple>
                                @foreach ($permissions as $permission )
                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">
                            <label class="d-block">Huquq tanlang</label>
                            @foreach ($permissions as $per )
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $per->id }}" id="defaultCheck{{ $loop->iteration }}">
                                <label class="form-check-label" for="defaultCheck{{ $loop->iteration }}">
                                    {{$per->name}}
                                </label>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Tasdiqlash</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('scripts')
    <script src="/assets/bundles/codemirror/lib/codemirror.js"></script>
    <script src="/assets/bundles/codemirror/mode/javascript/javascript.js"></script>


    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/assets/js/page/create-post.js"></script>
    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Kiritilgan parol to'g'ri kelmadi");
            }
            else
            {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
