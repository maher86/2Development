@extends('layouts.dashboard.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}
<section class="content">
    <div class="row">
        <div class="col-md-12">
        
                      <!-- Horizontal Form -->
                      <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">@lang('words.'.$objectName) يحتاج للمراجعة من قبلك <h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <div class="row">
                          <div class="col-md-6" style="border-left: solid darkgray 0.1px;">
                            <div class="card h-100">                  
                              <div class="single-post post-style-1">
                                <div class="blog-image" style="margin:10px;border-radius:20px">
                                @if($objectName=='Page')
                                <div class="blog-image"><img width="100%" height="240" src="{{asset('/storage/'.$theObject->url)}}" alt="Blog Image"></div>


                                @else
                                    <video width="100%" height="240" controls style="margin:2px">
                                      <source src="{{asset('/storage/'.$theObject->url)}}" type="video/mp4">
                                      <source src="movie.ogg" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif   
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6" style="height: 300px;overflow: auto;">
                            <div class="card h-100">                  
                              <div class="single-post post-style-1">
                                <div class="blog-image" style="margin:10px;border-radius:20px">
                                    <p >
                                    {{$theObject->body}}
                                    </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <form  method="post" action="{{route('handleNoty',[$objectName,$theObject->id,$notyId])}}">
                        {{ csrf_field() }}
                    {{method_field('POST')}}
                        <div class="form-group">
                        <label for="admin_comment" style="margin-top:10px;margin-right:20px">تعليقات المسؤول</label>
                        <textarea class="form-control" name="adminComment" id="admin_comment" cols="30" rows="10" style="margin-top: 20px;
    width: 550px;
    margin-right: 20px;">
                        </textarea>
                        
                        </div>
                        
                        <div class="box-footer">
                    <input type="submit"  class="btn btn-default" name ="submitButton" value="رفض" style="margin:10px">
                    <input type="submit"   class="btn btn-info pull-right" name="submitButton" value="موافقة" style="margin:10px">
                    </form>
                    
                  </div>
                      </div>
                      
        </div>
      </div>
</section>
@endsection