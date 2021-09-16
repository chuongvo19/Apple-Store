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
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/asset/rs-plugin/css/settings.css') }}" media="screen" />

<!-- Bootstrap Core CSS -->
<link href="{{ asset('frontend/asset/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('frontend/asset/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/asset/css/ionicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/css/responsive.css') }}" rel="stylesheet">

<!-- JavaScripts -->
<script src="{{ asset('frontend/asset/js/modernizr.js') }}"></script>

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
@include('frontend.layouts._header')
  
  <!--======= SUB BANNER =========-->
  @include('frontend.layouts._banner')
  
  <!-- Content -->
    @yield('content')
    
    <!-- About -->
    @include('frontend.layouts._footer')
  
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
<script src="{{ asset('frontend/asset/js/main.js') }}"></script>
</body>
</html>