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
                          <div class="col-md-6">
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
                        
                        <div class="box-footer">
                    <a href="{{route('handleNoty',['draft',$objectName,$theObject->id,$notyId])}}"  class="btn btn-default"  style="margin:10px">رفض</a>
                    <a href="{{route('handleNoty',['approve',$objectName,$theObject->id,$notyId])}}"  class="btn btn-info pull-right"  style="margin:10px">مصادقة</a>
                    
                  </div>
                      </div>
                      
        </div>
      </div>
</section>
@endsection