<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="M_Adnan">
<title>Apple Store</title>

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="{{ asset("frontend/asset/rs-plugin/css/settings.css") }}" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="{{ asset("frontend/asset/css/bootstrap.min.css") }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset("frontend/asset/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">
<link href="{{ asset("frontend/asset/css/ionicons.min.css") }}" rel="stylesheet">
<link href="{{ asset("frontend/asset/css/main.css") }}" rel="stylesheet">
<link href="{{ asset("frontend/asset/css/style.css") }}" rel="stylesheet">
<link href="{{ asset("frontend/asset/css/responsive.css") }}" rel="stylesheet">

<!-- JavaScripts -->
<script src="{{ asset("frontend/asset/js/modernizr.js") }}"></script>

<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- LOADER -->
<div id="loader">
  <div class="position-center-center">
    <div class="ldr"></div>
  </div>
</div>

<!-- Wrap -->
<div id="wrap"> 
  
  <!-- header -->
  <header>
    <div class="sticky">
      <div class="container"> 
        
        <!-- Logo -->
        <div class="logo"> <a href="{{ route('frontend.index') }}"><h4>APPLE STORE</h4></a> </div>
        <nav class="navbar ownmenu">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"><i class="fa fa-navicon"></i></span> </button>
          </div>
          <!-- NAV -->
          <div class="collapse navbar-collapse" id="nav-open-btn">
            <ul class="nav">
              <li class="dropdown"> <a href="{{ route('frontend.index') }}" >Trang chủ</a></li>
              @if (session('role-page') == 'loginForm')
              <li class=" active"> <a href="{{ route('frontend.login') }}"> Đăng Nhập</a> </li>
              @else
              <li class=""> <a href="{{ route('frontend.login') }}"> Đăng Nhập</a> </li>
              @endif
              @if (session('role-page') == 'register')
              <li class=" active"> <a href="{{ route('frontend.showRegisterForm') }}"> Đăng Ký</a> </li>
              @else
              <li> <a href="{{ route('frontend.showRegisterForm') }}"> Đăng Ký</a> </li>
              @endif
              <li> <a href="{{ route('frontend.show.contact') }}"> Liên hệ</a> </li>
            </ul>
          </div>
          <!-- Nav Right -->
        </nav>
      </div>
    </div>
  </header>
  <!-- Content -->
  <div id="content"> 
    @yield('content')
  </div>
  
  <!--======= FOOTER =========-->
  <footer>
    <div class="container"> 
        
        <!-- ABOUT Location -->
        <div class="col-md-3">
        <div class="about-footer"> <img class="margin-bottom-30" src="images/logo-foot.png" alt="" >
            <p><i class="icon-pointer"></i> 30 Đường Phạm Văn Đồng, <br>
                P. Cổ Nhuế 1, Q. Bắc Từ Liêm, Tp. Hà Nội.</p>
            <p><i class="icon-call-end"></i> 0972729989</p>
            <p><i class="icon-envelope"></i> AppleSotresphone@gmail.com</p>
        </div>
        </div>
        
        <!-- HELPFUL LINKS -->
        <div class="col-md-3">
        <h6>BẢO HÀNH – DỊCH VỤ</h6>
        <ul class="link">
            <li><a href="#."> 30 Đường Phạm Văn Đồng,</a></li>
            <li><a href="#."> Hotline: 0972729989</a></li>
            <li><a href="#."> Giờ làm việc: 08.30 – 17.30 ( Nghỉ Chủ nhật và ngày lễ ) </a></li>
        </ul>
        </div>
        
        <!-- SHOP -->
        <div class="col-md-3">
        <h6>CHĂM SÓC KHÁCH HÀNG</h6>
        <ul class="link">
            <li><a href="{{ route('frontend.show.contact') }}">Liên hệ</a></li>
        </ul>
        </div>
        
        <!-- MY ACCOUNT -->
        <div class="col-md-3">
        <h6>THEO DÕI CHÚNG TÔI TRÊN</h6>
        <ul class="link">
            <li><a href="https://www.facebook.com/Apple-Store-102817295515488/"> Facebook</a></li>
        </ul>
        </div>
        
        <!-- Rights -->
        
        <div class="rights">
        <p>©  2021 Apple Store. </p>
        <div class="scroll"> <a href="#wrap" class="go-up"><i class="lnr lnr-arrow-up"></i></a> </div>
        </div>
    </div>
</footer>
  
  <!--======= RIGHTS =========--> 
  
</div>
<script src="{{ asset('frontend/asset/js/jquery-1.11.3.min.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/own-menu.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/jquery.lighter.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/owl.carousel.min.js') }}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('frontend/asset/rs-plugin/js/jquery.tp.t.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/asset/rs-plugin/js/jquery.tp.min.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/main.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/main.js"') }}></script>
</body>
</html>