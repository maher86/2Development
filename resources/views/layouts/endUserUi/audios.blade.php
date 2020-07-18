@extends('layouts.endUserUi.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}

<div class="slider"></div><!-- slider -->
<section class="blog-area section">
<div class="container">

	<div class="row">
        
        @foreach($audios=App\audio::where('status', 'active')->get() as $audio)
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="{{asset('/storage/uploads/pageImages/_1594105423.jpg')}}" alt="Blog Image"></div>

							<a class="avatar" href="{{route('showSingleAudio',$audio->id)}}"><i class="ion-mic-a" style="font-size: xxx-large;
    color: powderblue;
}"></i></a>

							<div class="blog-info">

								<h4 class="title"><a href="{{route('showSingleAudio',$audio->id)}}"><b>{{$audio->title}}</b></a></h4>

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