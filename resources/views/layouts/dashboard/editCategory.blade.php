@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<div class="row" style="margin-right:15px;margin-left:15px;margin-top:30px">
    <div class="col-xs-12">
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">                
                  <h3 class="box-title">تعديل بيانات صنف</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                <form role="form" action="{{route('updateCategory',$category->id)}}" class="edit_Category" method="post"style="margin-top: 60px;" >
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="category_name">الإسم</label>
                        <input type="text"  name="name" class="form-control" id="category_name"  value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                        <label for="category_desc">الصنف</label>
                        <textarea type="text" name="desc" class="form-control" id="category_desc" >{{$category->desc}}</textarea>
                        </div>                    
                        

                        
                    </div><!-- /.box-body -->
                    <hr>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >تعديل </button>
                    <a class="btn btn-default " href="{{URL('/categories')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>



@endsection