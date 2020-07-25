@extends('layouts.endUserUi.temp')
@section('title', 'Page Title')  
@section('content') {{--Put your middle content--}}

<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
				
				@foreach($videos=App\Video::where('status', 'نشطة')->get() as $video  )
				@if($loop->last)
					<div class="row small-gutters">
						<div class="col-lg-8 top-post-left">
							<div class="feature-image-thumb relative">
								<div class="overlay overlay-bg"></div>
								<img  class="img-fluid" src="{{asset('/storage/'.$video->mediaCover)}}" style="width:757px;height:443px"alt="">								
							</div>
							<div class="top-post-details">
								<ul class="tags">
									<li><a href="#">{{App\Category::find($video->category_id)->name}}</a></li>
								</ul>
								<a href="image-post.html">
									<h3>{{$video->title}}</h3>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span>{{App\User::find($video->user_id)->name}}</a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$video->created_at->format('M D Y')}}</a></li>
									<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
								</ul>
							</div>
						</div>
						@endif
						@endforeach
						@foreach($pages=App\Page::where('status', 'نشطة')->get() as $page  )
						@if($loop->last)
						<div class="col-lg-4 top-post-right">
							<div class="single-top-post">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{asset('/storage/'.$page->url)}}" alt="" style="width:373px;height:216px">
								</div>
								<div class="top-post-details">
									<ul class="tags">
										<li><a href="#">{{App\Category::find($page->category_id)->name}}</a></li>
									</ul>
									<a href="image-post.html">
										<h4>{{$page->title}}.</h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span>{{App\User::find($page->user_id)->name}}</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$page->created_at->format('M D Y')}}</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
								</div>
							</div>
							@endif
							@endforeach
							@foreach($audios=App\Audio::where('status', 'نشطة')->get() as $audio  )
						@if($loop->last)
							<div class="single-top-post mt-10">
								<div class="feature-image-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{asset('/storage/'.$audio->mediaCover)}}" style="width:373px;height:216px"alt="">
								</div>
								<div class="top-post-details">
									<ul class="tags">
										<li><a href="#">{{App\Category::find($audio->category_id)->name}}</a></li>
									</ul>
									<a href="image-post.html">
										<h4>{{$audio->title}}</h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span>{{App\User::find($audio->user_id)->name}}</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$audio->created_at->format('M D Y')}}</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
								</div>
							</div>
							@endif
							@endforeach
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start latest-post Area -->
							<div class="latest-post-wrap">
								<h4 class="cat-title" style="text-align:right">آخر الفيدوهات</h4>
								@foreach($categories = App\Category::all() as $category)
								<div class="single-latest-post row align-items-center">									
									<div class="col-lg-5 post-left">
										<div class="feature-img relative">
											<div class="overlay overlay-bg"></div>
											
											<img class="img-fluid" style="width:278px;height:190px"src="{{asset('/storage/'.$category->video->last()->mediaCover)}}" alt="">
										</div>
										<ul class="tags">
											<li><a href="#">{{$category->name}}</a></li>
										</ul>
									</div>
									<div class="col-lg-7 post-right">
										<a href="image-post.html" style="float:right">
											<h4>{{$category->video->last()->title}}</h4>
										</a>
										<ul class="meta" style="float:right">
											<li><a href="#"><span class="lnr lnr-user"></span>{{App\User::find($category->video->last()->user_id)->name}}</a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$category->video->last()->created_at->format('M D Y')}}</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
										</ul>
										<p class="excert" style="height:70px;overflow:hidden;float:right">
											{{$category->video->last()->body}}
										</p>
									</div>									
								</div>
								@endforeach
								
							</div>
							<!-- End latest-post Area -->
							
							<!-- Start banner-ads Area -->
							
							<!-- End banner-ads Area -->
							<!-- Start popular-post Area -->
							<div class="popular-post-wrap">
								<h4 class="title">Popular Posts</h4>
								<div class="feature-post relative">
									<div class="feature-img relative">
										<div class="overlay overlay-bg"></div>
										<img class="img-fluid" src="img/f1.jpg" alt="">
									</div>
									<div class="details">
										<ul class="tags">
											<li><a href="#">Food Habit</a></li>
										</ul>
										<a href="image-post.html">
											<h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
										</a>
										<ul class="meta">
											<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
											<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
											<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
										</ul>
									</div>
								</div>
								<div class="row mt-20 medium-gutters">
									<div class="col-lg-6 single-popular-post">
										<div class="feature-img-wrap relative">
											<div class="feature-img relative">
												<div class="overlay overlay-bg"></div>
												<img class="img-fluid" src="img/f2.jpg" alt="">
											</div>
											<ul class="tags">
												<li><a href="#">Travel</a></li>
											</ul>
										</div>
										<div class="details">
											<a href="image-post.html">
												<h4>A Discount Toner Cartridge Is
												Better Than Ever.</h4>
											</a>
											<ul class="meta">
												<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
												<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
												<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
											</ul>
											<p class="excert">
												Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
											</p>
										</div>
									</div>
									<div class="col-lg-6 single-popular-post">
										<div class="feature-img-wrap relative">
											<div class="feature-img relative">
												<div class="overlay overlay-bg"></div>
												<img class="img-fluid" src="img/f3.jpg" alt="">
											</div>
											<ul class="tags">
												<li><a href="#">Travel</a></li>
											</ul>
										</div>
										<div class="details">
											<a href="image-post.html">
												<h4>A Discount Toner Cartridge Is
												Better Than Ever.</h4>
											</a>
											<ul class="meta">
												<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
												<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
												<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
											</ul>
											<p class="excert">
												Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
											</p>
										</div>
									</div>
								</div>
							</div>
							<!-- End popular-post Area -->
							
							
							<!-- End relavent-story-post Area -->
						</div>
						<div class="col-lg-4">
							<div class="sidebars-area">
								<div class="single-sidebar-widget editors-pick-widget">
									<h6 class="title"style="text-align:right;width:100%">آخر المقالات</h6>
									@foreach($categories as $category )
									<div class="editors-pick-post">
										<div class="feature-img-wrap relative">
											<div class="feature-img relative">
												<div class="overlay overlay-bg"></div>
												<img class="img-fluid" style="height:213px;"src="{{asset('/storage/'.$category->page->last()->url)}}" alt="">
											</div>
											<ul class="tags">
												<li><a href="#">{{$category->name}}</a></li>
											</ul>
										</div>
										<div class="details">
											<a href="image-post.html">
												<h4 class="mt-20">{{$category->page->last()->title}}</h4>
											</a>
											<ul class="meta">
												<li><a href="#"><span class="lnr lnr-user"></span>{{App\User::find($category->video->last()->user_id)->name}}</a></li>
												<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{$category->video->last()->created_at->format('M D Y')}}</a></li>
												<li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
											</ul>
											<p class="excert" style="height:70px;overflow:hidden">
												{{$category->video->last()->body}}
											</p>
										</div>
										</div>
										@endforeach


										
									</div>
								</div>
								
								<div class="single-sidebar-widget newsletter-widget">
									<h6 class="title">Newsletter</h6>
									<p>
										Here, I focus on a range of items
										andfeatures that we use in life without
										giving them a second thought.
									</p>
									<div class="form-group d-flex flex-row">
										<div class="col-autos">
											<div class="input-group">
												<input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="text">
											</div>
										</div>
										<a href="#" class="bbtns">Subcribe</a>
									</div>
									<p>
										You can unsubscribe us at any time
									</p>
								</div>
								
								<div class="single-sidebar-widget social-network-widget">
									<h6 class="title">Social Networks</h6>
									<ul class="social-list">
										<li class="d-flex justify-content-between align-items-center fb">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-facebook" aria-hidden="true"></i>
												<p>983 Likes</p>
											</div>
											<a href="#">Like our page</a>
										</li>
										<li class="d-flex justify-content-between align-items-center tw">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-twitter" aria-hidden="true"></i>
												<p>983 Followers</p>
											</div>
											<a href="#">Follow Us</a>
										</li>
										<li class="d-flex justify-content-between align-items-center yt">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-youtube-play" aria-hidden="true"></i>
												<p>983 Subscriber</p>
											</div>
											<a href="#">Subscribe</a>
										</li>
										<li class="d-flex justify-content-between align-items-center rs">
											<div class="icons d-flex flex-row align-items-center">
												<i class="fa fa-rss" aria-hidden="true"></i>
												<p>983 Subscribe</p>
											</div>
											<a href="#">Subscribe</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End latest-post Area -->
		</div>

@endsection