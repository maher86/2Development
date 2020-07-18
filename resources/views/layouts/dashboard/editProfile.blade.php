@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<div class="row" style="margin-right:15px;margin-left:15px;margin-top:30px">
    <div class="col-xs-12">
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">                
                  <h3 class="box-title">تعديل حساب {{$user->name}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="card" style="width:80%;max-width:400px;position: relative; margin-top: -80px;width: 150px; height: 150px; margin-left: 30px;float: left;">
                </div>
                <form role="form" action="{{route('update_profile',$user)}}"  method="post"style="margin-top: 60px;"enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div style="text-align:center"><img id="user-avatar"class="profile-user-img img-responsive img-circle" src="{{asset('storage/'.$user->avatar)}}" style="display:inline-block;border-radius:50%;width:150px;height:150px" alt="User profile picture"></div>
                    <div style="text-align:center;margin-top: -15px;">
            <a style="display:inline-block">
              <label for="file"><i class="fa fa fa-camera"style="margin-top: -20px;margin-left: 102px;font-size: x-large;color: cornflowerblue"></i>
                <input onchange="readURL(this)" type="file" id="file" style="display: none" name="image" accept="image/gif,image/jpeg,image/jpg,image/png" multiple="" data-original-title="upload photos">
              </label>
            </a>
      </div>
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">الإسم</label>
                        <input type="text"  name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="أدخل الإسم هنا">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">البريد الإلكتروني</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email"  placeholder="Enter email" value="{{$user->email}}"  $autocomplete="email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div> 

                        <div class="form-group ">
                            <label for="password" >كلمة السر</label>                   
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="password-confirm" >تأكيد كلمة السر</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>   
                        

                        
                    </div><!-- /.box-body -->
                    <hr>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >تعديل </button>
                    <a class="btn btn-default " href="{{URL('/users')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>



@endsection