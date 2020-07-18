@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color:rgba(0,0,0,0.5)">
                <div class="card-header" style="text-align: right;color:#ffff">{{ __('إنضمام') }}</div>

                <div class="card-body">
                    <form method="POST" id="register-form" style="direction:rtl"action="{{route('register')}}" enctype="multipart/form-data">
                        @csrf
                        <div style="text-align:center"><img id="user-avatar"class="profile-user-img img-responsive img-circle" src="{{asset('storage/uploads/avatars/default.jpg')}}" style="display:inline-block;border-radius:50%;width:150px;height:150px" alt="User profile picture"></div>
      <div style="text-align:center;margin-top: -15px;">
            <a style="display:inline-block">
              <label for="file"><i class="fa fa fa-camera"style="margin-top: -20px;margin-left: -72px;font-size: x-large;color: cornflowerblue"></i>
                <input onchange="readURL(this)" type="file" id="file" style="display: none" name="image" accept="image/gif,image/jpeg,image/jpg,image/png" multiple="" data-original-title="upload photos">
              </label>
            </a>
      </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" style="color:#fff">الإسم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"style="color:#fff">البريد الإلكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"style="color:#fff">كلمة السر</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"style="color:#fff">تأكيد كلمة السر</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    الإنضمام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
