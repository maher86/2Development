@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<section class="content">
    <div class="row">
        <div class="col-md-12" style="margin: 10px 200px;"> 
            <span class="text-icon" style="position:relative">
           <h3> لقد تم {{$Entity->status}} @lang('words.'.$theEntityName)  الخاص بك </h3>
           <i class="{{$Entity->status=='رفض' ? 'fa fa-times' : 'fa fa-check'}}" aria-hidden="true" style="{{$Entity->status=='رفض' ? 'color: red' : 'color:green' }}; font-size: 50px;position: absolute;margin-top: -50px;margin-right: 350px;"></i>
           </span>

          
                     
        </div>
        <h4 style="margin:20px 20px">   عنوان @lang('words.'.$theEntityName): </h4>
        <h5 style="margin:20px 20px">{{$Entity->title}}</h5>
        <div class="form-group">
            <label for="admin_comment" style="margin-top:10px;margin-right:20px;font-size: 1.17em">تعليقات المسؤول :</label>
            <textarea  disabled class="form-control" name="adminComment" id="admin_comment" cols="30" rows="10" style="margin-top: 20px; width: 550px; margin-right: 20px;">{{$Entity->adminComment}}</textarea>
        </div>
        <a href= {{URL('/admin')}} class="btn btn-primary" style="margin-top:10px;margin-right:20px;"><i class="fa fa-home" aria-hidden="true" > الرجوع للرئيسية</i></a>
    
</section>
@endsection