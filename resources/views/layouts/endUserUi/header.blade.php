<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>جمعية نحو التنمية</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="{{asset('endUserUi/common-css/bootstrap.css')}}" rel="stylesheet">

	<link href="{{asset('endUserUi/common-css/ionicons.css')}}" rel="stylesheet">
	<link href="{{asset('endUserUi/common-css/styles.css')}}" rel="stylesheet">

	<link href="{{asset('endUserUi/common-css/responsive.css')}}" rel="stylesheet">


	<link href="{{asset('endUserUi/layout-1/css/stylesme.css')}}" rel="stylesheet">

	<link href="{{asset('endUserUi/layout-1/css/responsive.css')}}" rel="stylesheet">

</head>
<body >

	<header style="margin-bottom:-22px;position: fixed; left: 0; top: 0;width: 100%;z-index: 1000;">
		<div class="container-fluid position-relative no-side-padding" style="position:relative">

			<a href="#" class="logo"><h4>جمعية نحو التنمية</h4></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="#">الرئيسة</a></li>
				<li><a href="#">الفيديوهات</a></li>
				<li><a href="{{route('showAudiosPage')}}">التسجيلات</a></li>
				<li><a href="#">النشاطات</a></li>				
				<li><a href="#">من نحن</a></li>
			</ul><!-- main-menu -->

			<div class="src-area">
				<form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form>
			</div>

		</div><!-- conatiner -->
	</header>

	