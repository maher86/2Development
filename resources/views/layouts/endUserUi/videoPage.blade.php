@extends('layouts.endUserUi.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}

<!-- <div class="slider"style="height: 600px;
    width: 100%;
    background-image:url('{{asset('/storage/uploads/pageImages/_1594009212.jpg')}}');
    
	background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
	"></div>slider -->
<section class="post-area">
   
		<div class="container">

			<div class="row" style="direction:rtl">

				<div class="col-lg-1 col-md-0"></div>
				<div class="col-lg-10 col-md-12">
                <div class="main-post"style="margin-top:50px">

<div class="post-top-area">

    <!-- <h5 class="pre-title">FASHION</h5>     -->
    <div class="blog-image" style="margin-top:10px;border-radius:20px">
        <video width="100%" height="100%" controls>
            <source src="{{asset('/storage/'.$video->url)}}" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            متصفحك لا يدعم هذا المشغل
        </video>
    </div>

    <div class="post-info">
            <div class="left-area">
                <a class="avatar" href="#"><img src="{{asset('/storage/'.App\User::find($video->user_id)->avatar)}}" alt="Profile Image"></a>
            </div>
            <div class="middle-area">
                <a class="name" href="#"><b>{{App\User::find($video->user_id)->name}}</b></a>
                <h6 class="date">{{$video->created_at->format('M D Y')}} at {{$video->created_at->format('H:i:s')}}</h6>
            </div>
    </div><!-- post-info -->

    <p class="para">{{$video->body}}</p>
</div><!-- post-top-area -->



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

    

    

</div><!-- post-bottom-area -->

</div>
                </div>
            </div>
        </div>
</section>

<section class="comment-section center-text">
		<div class="container">
			<h4><b>التعليقات</b></h4>
			<div class="row">

				<div class="col-lg-2 col-md-0"></div>

				<div class="col-lg-8 col-md-12">
					<div class="comment-form">
						<form method="post" action="{{route('saveVideoComment',$video)}}">
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
										placeholder="اكتب تعليقك هنا" aria-required="true" aria-invalid="false"></textarea >
								</div><!-- col-sm-12 -->
								<div class="col-sm-12">
									<button class="submit-btn" type="submit" id="form-submit"><b>أرسل التعليق</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
					</div><!-- comment-form -->

					<h4><b>التعليقات({{$video->comments()->count()}})</b></h4>
					@foreach($video->comments as $comment)
					

					<div class="commnets-area text-left">

						<div class="comment" style="direction:rtl">

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="{{asset('/storage/'.App\User::find($comment->user_id)->avatar)}}" alt="Profile Image"></a>
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

						<!-- <div class="comment">
							<h5 class="reply-for">Reply for <a href="#"><b>Katy Lui</b></a></h5>

							<div class="post-info">

								<div class="left-area">
									<a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg" alt="Profile Image"></a>
								</div>

								<div class="middle-area">
									<a class="name" href="#"><b>Katy Liu</b></a>
									<h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
								</div>

								<div class="right-area">
									<h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
								</div>

							</div> post-info 

							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
								ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
								Ut enim ad minim veniam</p>

						</div> -->

					</div><!-- commnets-area -->
					@endforeach

					

					<!-- <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a> -->

				</div><!-- col-lg-8 col-md-12 -->

			</div><!-- row -->

		</div><!-- container -->
	</section>

@endsection
