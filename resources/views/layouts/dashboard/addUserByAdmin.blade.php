@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<div class="row" style="margin-right:15px;margin-left:15px;margin-top:30px">
    <div class="col-xs-12">
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">                
                  <h3 class="box-title">إضافة مستخدم جديد</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" action="{{route('add_user')}}" method="post"style="margin-top: 60px;" >
                    {{ csrf_field() }}
                    {{method_field('POST')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">الإسم</label>
                        <input type="text"  name="name" class="form-control" id="exampleInputEmail1"  placeholder="أدخل الإسم هنا">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">البريد الإلكتروني</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="إدخال البريد الإلكتروني" >
                        </div>                    
                        <div class="form-group">
                            <label for="roles" style="display:block"> الصلاحيات</label>
                            <hr>
                            @foreach((App\Role::all()) as $role)
                            <div class="checkbox" style="display:inline-block">
                           
                            <label style="padding-left:100px">
                                <input type="checkbox" name="roles[]" value="{{$role->name}}" ><b>{{$role->name}}</b>
                            
                            </label>
                            </div>
                            @endforeach
                        </div>

                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >إضافة </button>
                    <a class="btn btn-default " href="{{URL('/users')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>



@endsection