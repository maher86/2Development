@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<section class="content">
<div class="row" style="margin-right:15px;margin-left:15px;margin-top:30px">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="col-xs-12">
        <div class="col-md-12">
              <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">                
                  <h3 class="box-title"> تعديل معلومات الفيديو</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                

                <form role="form" action="{{route('videos.update',$video)}}"  method="post"style="margin-top: 60px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">عنوان الفيديو</label>
                        <input type="text"  name="title" class="form-control" id="exampleInputEmail1" value="{{$video->title}}" placeholder="عنوان الصفحة">
                        </div>
                        <div class="form-group">
                            <label for="bodyPage">الوصف</label>
                            <textarea class="form-control" name="body" id="bodyPage"  rows="10">{{$video->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="bodyPage">الصنف</label>
                            <select class="form-control" name="category" >
                            <option value="">إختر تصنيف لهذا الفيديو</option>
                            @foreach(App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                            
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="videof">الفيديو المرفوع </label>
                            <input type="file" name="videoFile"class="form-control-file" id="videof">
                        </div> 
                        <div class="form-group">
                            <label >  حالةالفيديو</label>
                            <br>
                            <input type="radio" name="status" value="نشطة" {{$video->status == 'active'? 'checked' : ''}}  ><b>نشطة</b>
                            <input type="radio" name="status" value="مسودة"  {{$video->status == 'draft'? 'checked' : ''}} ><b>مسودة</b>

                        </div> 
                    </div><!-- /.box-body -->
                    <hr>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >تعديل </button>
                    <a class="btn btn-default " href="{{URL('/videos')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>
</section>
@endsection