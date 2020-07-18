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
			<div class="col-lg-10 col-md-12">
				<div class="main-post"style="margin-top:50px">
					<div class="row">
						
						<div class="col-lg-6 col-md-6" style="border-left: groove;">
							<div class="post-top-area" >
								<div style="clear:both;margin-bottom:40px">
									<h4 style="float:right;margin-left:20px">الضيف:</h4>
									<h4>خالد الصياح</h4>
								</div>
								<hr>
								<div style="clear:both;margin-bottom:40px">
									<h4 style="float:right;margin-left:20px">المحاور:</h4>
									<h4>عواد البردان</h4>
								</div>
								<hr>
								<div style="margin-bottom:40px">
									<h4 >موضوع النقاش:</h4>
									<p>{{$audio->body}}</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="post-top-area">
								 
								<div class="blog-image" style="margin-top:10px;border-radius:20px">
									<video width="100%" height="100%" poster="{{asset('/storage/uploads/pageImages/_1594105317.jpg')}}" controls>
										<source src="{{asset('/storage/'.$audio->url)}}" type="video/mp4">
										<source src="movie.ogg" type="video/ogg">
										Your browser does not support the video tag.
									</video>
								</div>

								<div class="post-info">
										<div class="left-area">
											<a class="avatar" href="#"><img src="{{asset('/storage/'.App\User::find($audio->user_id)->avatar)}}" alt="Profile Image"></a>
										</div>
										<div class="middle-area">
											<a class="name" href="#"><b>{{App\User::find($audio->user_id)->name}}</b></a>
											<h6 class="date">{{$audio->created_at->format('M D Y')}} at {{$audio->created_at->format('H:i:s')}}</h6>
										</div>
								</div><!-- post-info -->

								<p class="para"></p>
							</div><!-- post-top-area -->
						</div>
 					</div>
				</div>
			</div>

		</div>
	</div>	
</section>

<section class="comment-section center-text">
		<div class="container">
			<h4 style="margin-top:20px"><b>التعليقات</b></h4>
			<div class="row">

				<div class="col-lg-3 col-md-0"></div>

				<div class="col-lg-8 col-md-12">
					<div class="comment-form">
						<form method="post" action="{{route('saveAudioComment',$audio)}}">
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
									<button class="submit-btn" type="submit" id="form-submit"><b>ارسل تعليقك</b></button>
								</div><!-- col-sm-12 -->

							</div><!-- row -->
						</form>
					</div><!-- comment-form -->

					<h4><b>التعليقات({{$audio->comments()->count()}})</b></h4>
					@foreach($audio->comments as $comment)
					

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
