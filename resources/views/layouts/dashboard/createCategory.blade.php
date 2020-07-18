@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<div class="row" style="margin-right:15px;margin-left:15px;margin-top:30px">
    <div class="col-xs-12">
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">                
                  <h3 class="box-title">إضافة صنف جديد</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" action="{{route('storeCategory')}}" method="post"style="margin-top: 60px;" >
                    {{ csrf_field() }}
                    {{method_field('POST')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="category_name">الإسم</label>
                        <input type="text"  name="name" class="form-control" id="category_name"  placeholder="أدخل الإسم هنا">
                        </div>
                        <div class="form-group">
                            <label for="category_desc">الوصف</label>
                            <textarea class="form-control" name="desc" id="category_desc" rows="10"></textarea>
                        </div>                     
                        

                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >إضافة </button>
                    <a class="btn btn-default " href="{{URL('/admin')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>



@endsection