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
                  <h3 class="box-title">إنشاء صفحة جديدة</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                

                <form role="form" action="{{route('pages.store')}}"  method="post"style="margin-top: 60px;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('POST')}}
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">عنوان الصفحة</label>
                        <input type="text"  name="title" class="form-control" id="exampleInputEmail1"  placeholder="عنوان الصفحة">
                        </div>
                        <div class="form-group">
                            <label for="bodyPage">النص</label>
                            <textarea class="form-control" name="body" id="bodyPage" rows="10"></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="imageCover">صورة غلاف الصفحة</label>
                            <input type="file" name="imagePage"class="form-control-file" id="imageCover">
                        </div> 
                        <div class="form-group">
                            <label >  حالة الصفحة</label>
                            <br>
                            <input type="radio" name="status" value="نشطة" {{Auth::user()->hasRole('super_admin') ? 'checked' : '' }}  {{!Auth::user()->hasRole('super_admin') ? 'disabled' : '' }}  ><b>نشطة</b>
                            <input type="radio" name="status" value="مسودة" {{!Auth::user()->hasRole('super_admin') ? 'checked' : '' }}  {{Auth::user()->hasRole('super_admin') ? 'disabled' : '' }}  ><b>مسودة</b>

                        </div> 
                    </div><!-- /.box-body -->
                    <hr>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-primary" >إنشاء </button>
                    <a class="btn btn-default " href="{{URL('/pages')}}">إلغاء</a>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</div>
</section>
@endsection