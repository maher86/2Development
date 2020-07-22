<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>لوحة التحكم</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{asset('dashboard/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/fonts/font-awesome.min.css')}}">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/fonts/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/iCheck/flat/blue.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{asset('dashboard/dist/fonts/fonts-fa.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/rtl.css')}}">
    <script src="{{asset('dashboard/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('dashboard/plugins/jQueryUI/jquery-ui.min.js')}}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><i class="fa fa-gears"></i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>جمعية نحو التنمية</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- Notifications: style can be found in dropdown.less -->
              
                            
              
              
              <!---create page,video,audio-->
              <!-- {{$count = DB::table('notifications')
                            ->where('notifiable_id',Auth::id())
                            ->where('type','App\Notifications\CreateAudio')
                            ->orWhere('type','App\Notifications\CreatePage')
                            ->orWhere('type',' App\Notifications\CreateVideo')
                            ->count()}} -->
              <!-- <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-pencil-square-o"></i>
                  
                  @if($count>0)
                  
                  <span class="label label-danger">{{$count}}</span>
                  @endif
                </a>
                @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin') )
                <ul class="dropdown-menu">
                  <li class="header">You have {{$count}}  notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data 
                    <ul class="menu">
                    
                    @foreach( DB::table('notifications')
                            ->where('notifiable_id',Auth::id())
                            ->where('type','App\Notifications\CreateAudio')
                            ->orWhere('type','App\Notifications\CreatePage')
                            ->orWhere('type',' App\Notifications\CreateVideo')
                            ->get()  as $notification)
                            
                        <li><!-- Task item ->
                          <a href="#">
                          <span style="color:blue">  </span><span style="color:#00a65a"></span>
                          </a>
                        </li><!-- end task item --
                      @endforeach
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all notifications</a>
                  </li>
                </ul>
                @endif
              </li> -->
              
              
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell"></i>
                  
                  @if(Auth::check() && Auth::user()->unreadNotifications->count()>0)
                  
                  <span class="label label-danger">{{Auth::user()->unreadNotifications->count()}}</span>
                  @endif
                </a>
                @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin') )
                <ul class="dropdown-menu">
                  <li class="header">You have {{Auth::user()->unreadNotifications->count()}}  notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                    @foreach(Auth::user()->unreadNotifications  as $notification)
                      <li><!-- Task item -->
                        @if($notification->type=="App\Notifications\AddingUser" ||$notification->type=="App\Notifications\DeleteUser"|| $notification->type=="App\Notifications\ApprovedEntity" || $notification->type== "App\Notifications\RejectedEntity")
                        <a href="{{route('showReturnNotyPage',$notification->id)}}">
                        @else
                        <a href="{{route('showInfo',[$notification->type,$notification->data['id'],$notification->data['objId'],$notification->id])}}">
                        @endif
                        <span style="color:blue"> {{$notification->data['message']}} </span><span style="color:#00a65a"></span>
                        </a>
                      </li><!-- end task item -->
                      @endforeach
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all notifications</a>
                  </li>
                </ul>
                @endif
              </li>

              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('/storage/'.Auth::user()->avatar)}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('/storage/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                    <p>
                      {{Auth::user()->name}}                    
                      <small>Member since {{Auth::user()->created_at}}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                   
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{route('dashboard.showUserProfile',Auth::id())}}" class="btn btn-default btn-flat">حسابي</a>
                    </div>
                    <div class="pull-left">
                      <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                      <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل خروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-right image">
              <img src="{{asset('/storage/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}} </p>
              <!-- <a href="#"><i class="fa fa-circle text-success"></i> متصل</a> -->
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="ابحث هنا ...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="active treeview">
              <a href="{{URL('/admin')}}">
                <i class="fa fa-dashboard"></i> <span>الرئيسة</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <!-- <ul class="treeview-menu">
                <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> پیشخوان v1</a></li>
                <li><a href="index2.html"><i class="fa fa-circle-o"></i> پیشخوان v2</a></li>
              </ul> -->
            </li>            
            @if (Auth::user()->hasRole('super_admin') )
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>المستخدمون</span>
                <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i>كل المستخدمون</a></li>
                <li><a href="{{route('showForm')}}"><i class="fa fa-circle-o"></i> إضافة مستخدم جديد </a></li>
               
                
              </ul>
            </li>
            @endif
            <li class="treeview">
              <a href="{{route('showCategories')}}">
                <i class="fa fa-users"></i>
                <span>الأصناف</span>
                <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('showCategories')}}"><i class="fa fa-circle-o"></i>كل الأصناف</a></li>
                <li><a href="{{route('showForm')}}"><i class="fa fa-circle-o"></i> إضافة صنف جديد </a></li>
               
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>الصفحات</span>
                <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('pages.index')}}"><i class="fa fa-circle-o"></i>الصفحات</a></li>
                <li><a href="{{route('pages.create')}}"><i class="fa fa-circle-o"></i>إنشاء صفحة جديدة </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> نشطة</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> مسودة</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-video-camera"></i> <span>الفيديوهات التعليمية</span>
                <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('videos.index')}}"><i class="fa fa-circle-o"></i> كل الفيديوهات</a></li>
              <li><a href="{{route('videos.create')}}"><i class="fa fa-circle-o"></i> إنشاء فيديو جديد</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> جديد</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>مسودة </a></li>
              </ul>
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-microphone"></i> <span>التسجيلات الصوتية</span>
                <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu">
              <li><a href="{{route('audios.index')}}"><i class="fa fa-circle-o"></i> كل التسجيلات</a></li>
              <li><a href="{{route('audios.create')}}"><i class="fa fa-circle-o"></i> إنشاء تسجيل جديد</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> جديد</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>مسودة </a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-tasks"></i> <span>نظام المهام</span>
                
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-archive"></i> <span>نظام الأرشفة</span>
                
              </a>
            </li>
            
              
		
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            الرئيسية
            <!-- <small>پنل مدیریت</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> عام</a></li>
            <li class="active">الرئيسية</li>
          </ol>
        </section>
