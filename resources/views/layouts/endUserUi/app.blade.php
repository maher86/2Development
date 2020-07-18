@extends('layouts.endUserUi.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}

<div class="slider"></div><!-- slider -->
<section class="blog-area section">
<div class="container">

	<div class="row">
        
        @foreach($pages=App\Page::where('status', 'نشطة')->get() as $page)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('/storage/'.$page->url)}}" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="{{asset('/storage/'.App\User::find($page->user_id)->avatar)}}" alt="Profile Image"></a>

							<div class="blog-info">

								<h4 class="title"><a href="{{route('showPost',$page->id)}}"><b>{{$page->title}}</b></a></h4>

								<!-- <ul class="post-footer">
									<li><a href="#"><i class="ion-heart"></i>57</a></li>
									<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									<li><a href="#"><i class="ion-eye"></i>138</a></li>
								</ul> -->

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
        </div><!-- col-lg-4 col-md-6 -->
        @endforeach	
		
	</div>
	<a class="load-more-btn" href="#"><b>شاهد المزيد</b></a>

		

	<div class="row" style="display: flex;justify-content: center;align-items: center;">
		<div class="col-lg-4 col-md-6">
		<h3 center>الفيديوهات</h3>		
		</div>
	</div>
	<div class="row">
		
		@foreach($videos=App\Video::where('status', 'نشطة')->get() as $video)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image" style="margin-top:10px;border-radius:20px"><video width="320" height="240" controls>
  <source src="{{asset('/storage/'.$video->url)}}" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video></div>

							

							<div class="blog-info"> 

								<h4 class="title"><a href="{{route('showVideoPage',$video->id)}}"><b>{{$video->title}}</b></a></h4>
								<h5>شاهد الفيديو وإقرأ المزيد</h5>

								<!-- <ul class="post-footer">
									<li><a href="#"><i class="ion-heart"></i>57</a></li>
									<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									<li><a href="#"><i class="ion-eye"></i>138</a></li>
								</ul> -->

							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
        </div><!-- col-lg-4 col-md-6 -->
        @endforeach		
	</div>

			
		

			<a class="load-more-btn" href="#"><b>شاهد المزيد</b></a>

</div><!-- container -->
</section><!-- section -->

@endsection