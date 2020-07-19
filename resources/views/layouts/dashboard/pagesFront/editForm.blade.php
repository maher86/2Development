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
                  <h3 class="box-title"> تعديل معلومات الصفحة</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                

                <form role="form" action="{{route('pages.update',$page)}}"  method="post"style="margin-top: 60px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">عنوان الصفحة</label>
                        <input type="text"  name="title" class="form-control" id="exampleInputEmail1" value="{{$page->title}}" placeholder="عنوان الصفحة">
                        </div>
                        <div class="form-group">
                            <label for="bodyPage">النص</label>
                            <textarea class="form-control" name="body" id="bodyPage"  rows="10">{{$page->body}}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="imageCover">صورة غلاف الصفحة</label>
                            <input type="file" name="imagePage"class="form-control-file" id="imageCover">
                        </div> 
                        <div class="form-group">
                            <label for="bodyPage">الصنف</label>
                            <select class="form-control" name="category" style="padding-top:0px">
                            <option value="">إختر تصنيف لهذا الصفحة</option>
                            @foreach(App\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach
                            
                            </select>
                        </div> 

                        <div class="form-group">
                            <label >  حالة الصفحة</label>
                            <br>
                            <input type="radio" name="status" value="نشطة" {{$page->status == 'نشطة'? 'checked' : ''}}  ><b>نشطة</b>
                            <input type="radio" name="status" value="مسودة"  {{$page->status == 'مسودة'? 'checked' : ''}} ><b>مسودة</b>

                        </div> 
                    </div><!-- /.box-body -->
                    <hr>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >تعديل </button>
                    <a class="btn btn-default " href="{{URL('/pages')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>
</section>
@endsection