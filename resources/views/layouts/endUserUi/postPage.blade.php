@extends('layouts.endUserUi.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}

<div class="slider"style="height: 600px;
    width: 100%;
    background-image:url('{{asset('/storage/'.$page->url)}}');
    
	background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
	"></div><!-- slider -->
<section class="post-area">
   
		<div class="container">

			<div class="row" style="direction:rtl">

				<div class="col-lg-1 col-md-0"></div>
				<div class="col-lg-10 col-md-12">

					<div class="main-post">

						<div class="post-top-area">

							<h5 class="pre-title">FASHION</h5>

							<h3 class="title"><a href="#"><b>{{$page->title}}</b></a></h3>

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('/storage/'.App\User::find($page->user_id)->avatar)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{App\User::find($page->user_id)->name}}</b></a>
									<h6 class="date">{{$page->created_at->format('M D Y')}} at {{$page->created_at->format('H:i:s')}}</h6>
								</div>

							</div><!-- post-info -->

							<p class="para">{{$page->body}}</p>
						</div><!-- post-top-area -->

						<div class="post-image"><img src="images/blog-1-1000x600.jpg" alt="Blog Image"></div>

						<div class="post-bottom-area">

							<!-- <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
							ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
							nulla pariatur. Excepteur sint
							occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p> -->

							<!-- <ul class="tags">
								<li><a href="#">Mnual</a></li>
								<li><a href="#">Liberty</a></li>
								<li><a href="#">Recommendation</a></li>
								<li><a href="#">Inspiration</a></li>
							</ul> -->

							<div class="post-icons-area">
								<ul class="post-icons">
									<li><a href="#"><i class="ion-heart"></i>57</a></li>
									<li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
									<li><a href="#"><i class="ion-eye"></i>138</a></li>
								</ul>

								<ul class="icons">
									<li>SHARE : </li>
									<li><a href="#"><i class="ion-social-facebook"></i></a></li>
									<li><a href="#"><i class="ion-social-twitter"></i></a></li>
									<li><a href="#"><i class="ion-social-pinterest"></i></a></li>
								</ul>
							</div>

							<div class="post-footer post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('/storage/'.App\User::find($page->user_id)->avatar)}}" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>{{App\User::find($page->user_id)->name}}</b></a>
									<h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
								</div>

							</div><!-- post-info -->

						</div><!-- post-bottom-area -->

					</div><!-- main-post -->
				</div><!-- col-lg-8 col-md-12 -->
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- post-area -->

	<hr>
	<h3  style="text-align:center;direction:rtl">مقالات أخرى من  {{App\User::find($page->user_id)->name}}</h3>
	<section class="recomended-area section">
		<div class="container">
			<div class="row">
            @foreach($pages=App\Page::where('status', 'active')->where('user_id',$page->user_id)->orderBy('id', 'desc')->take(3)->get() as $page)
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
				</div><!-- col-md-6 col-sm-12 -->

				

				
			@endforeach
			</div><!-- row -->

		</div><!-- container -->
	</section>

	<section class="comment-section center-text">
		<div class="container">
			<h4><b>التعليقات</b></h4>
			<div class="row">

				<div class="col-lg-2 col-md-0"></div>

				<div class="col-lg-8 col-md-12">
					<div class="comment-form">
						<form method="post" action="{{route('savePostComment',$page)}}">
							<div class="row">
							{{ csrf_field() }}
                    {{method_field('POST')}}
								<!-- <div class="col-sm-6">
									<input type="text" aria-required="true" name="contact-form-name" class="form-control"
										placeholder="Enter your name" aria-invalid="true" required >
								</div>col-sm-6 -->
								<!-- <div class="col-sm-6">
									<input type="email" aria-required="true" name="contact-form-email" class="form-control"
										placeholder="Enter your email" aria-invalid="true" required>
								</div>col-sm-6 -->

								<div class="col-sm-12">
									<textarea name="body" rows="2" class="text-area-messge form-control"
										placeholder="أكتب تعليقك هنا" aria-required="true" aria-invalid="false"></textarea >
								</div><!-- col-sm-12 -->
								<div class="col-sm-12">
									<button class="submit-btn" type="submit" id="form-submit"><b>ارسل تعليقك</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
					</div><!-- comment-form -->

					<h4><b>التعليقات({{$page->comments()->count()}})</b></h4>
					@foreach($page->comments as $comment)
					

					<div class="commnets-area text-left">

						<div class="comment" style="direction:rtl">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
								</div>

								<div class="middle-area" style="padding-left:400px">
									<a class="name" href="#"><b>{{Auth::user()->name}}</b></a>
									<h6 class="date">{{$comment->created_at}}</h6>
								</div>

								<!-- <div class="right-area">
									<h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
								</div> -->

							</div><!-- post-info -->

							<p style="float: right; margin-top: 30px;">{{$comment->body}}</p>

						</div>
						</div>
						@endforeach

				</div><!-- col-lg-8 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section>






@endsection