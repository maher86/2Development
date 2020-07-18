@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<div class="row" style="margin-right:15px;margin-left:15px;margin-top:30px">
    <div class="col-xs-12">
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">                
                  <h3 class="box-title">تعديل بيانات {{$user->name}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="card" style="width:80%;max-width:400px;position: relative;
    margin-top: -80px;
    width: 150px;
    height: 150px;
    margin-left: 30px;
    float: left;">
  <img src="{{asset('/storage/'.$user->avatar)}}" alt="Norway" class="img-thumbnail" style="width:100%;box-shadow:0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
  
</div>
                <form role="form" action="{{route('update_user',$user->id)}}" class="edit_form" method="post"style="margin-top: 60px;" >
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">الإسم</label>
                        <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{$user->name}}" placeholder="أدخل الإسم هنا">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  disabled placeholder="Enter email" value="{{$user->email}}">
                        </div>                    
                        <div class="form-group">
                            <label for="roles" style="display:block">الصلاحيات</label>
                            <hr>
                            @foreach((App\Role::all()) as $role)
                            <div class="checkbox" style="display:inline-block">
                            <label style="padding-left:100px" >
                                <input type="checkbox" name="roles[]" value="{{$role->name}}" {{$user->hasRole($role->name) ? 'checked' : ''}}> <b>{{$role->name}}</b>
                            
                            </label>
                            </div>
                            @endforeach
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