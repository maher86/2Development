@extends('layouts.dashboard.temp')
@section('title', 'Page Title')
@section('content') {{--Put your middle content--}}
<section class="content">
<div class="row">
  <div class="col-md-6" style=" float: none; margin: 0 auto;">
    <div class="box box-primary">
      <div class="box-body box-profile">
     
      <form method="post" id="user_avatar_form" encrypt="multipart/form-data">
      @csrf
        <img id="user-avatar"class="profile-user-img img-responsive img-circle" src="{{asset('storage/'.Auth::user()->avatar)}}" style="float: none;margin: 0 auto;" alt="User profile picture">
      <div style="text-align:center;margin-top: -15px;">
            <a style="display:inline-block">
              <label for="file"><i class="fa fa fa-camera"style="margin-top: -20px;margin-left: -72px;font-size: x-large;"></i>
                <input onchange="doAfterSelectImage(this)" type="file" id="file" style="display: none" name="image" accept="image/gif,image/jpeg,image/jpg,image/png" multiple="" data-original-title="upload photos">
              </label>
            </a>
      </div>
      </form>
              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">{{Auth::user()->display_name}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>الصلاحيات</b> <a class="pull-left">{{Auth::user()->roles->pluck('name')->implode(' , ')}}</a>
                </li>
                <li class="list-group-item">
                  <b>عدد المنشورات</b> <a class="pull-left">0</a>
                </li>
                <li class="list-group-item">
                  <b>تاريخ التسجيل</b> <a class="pull-left">{{(Auth::user()->created_at)->format('Y-m-d')}}</a>
                </li>
              </ul>

              <a href="{{route('show_Profile_Form',Auth::user())}}" class="btn btn-primary btn-block"><b>تحديث</b></a>
            </div>
            <!-- /.box-body -->
          </div>
</div>
</div>
</div>
</section>



@endsection
