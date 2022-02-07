<!DOCTYPE html>
<head>
<title>Apple Store</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('backend/asset/css/bootstrap.min.css') }}" >
<link rel="icon" type="image/png" href="{{ asset('backend/asset/images/icon-apple-store.png') }}">

<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{!! asset('backend/asset/css/style.css') !!}" rel='stylesheet' type='text/css' />
<link href="{{ asset('backend/asset/css/style-responsive.css') }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('backend/asset/css/font.css') }}" type="text/css"/>
<link href="{{ asset('backend/asset/css/font-awesome.css') }}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{ asset('backend/asset/js/jquery2.0.3.min.js') }}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	@if (!Session::has('confirm'))
		<h2>XÁC NHẬN EMAIL</h2>
		<form action="{{ route('auth.forgot.password') }}" method="post">
			@csrf
			<h4>Vui lòng nhập email *****@gmail.com mà bạn đã đăng ký: </h4>
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			@if(Session::has('error'))
				<div class='custom-infomation-error'>
				{{ Session::get('error') }}
				</div>
			@endif
				<div class="clearfix"></div>
				<input type="submit" value="Xác Thực" name="login">
				<h6><a href="{{ route('admin.login') }}">Back</a></h6>
		</form>
	@else
	<h2>XÁC NHẬN CODE</h2>
		<form action="{{ route('auth.reset.password.form') }}" method="post">
			@csrf
			<h4>Chúng tôi đã gửi 1 mã code vào mail của bạn vui lòng nhập mã xác thực: </h4>
			<input type="text" class="ggg" name="token" placeholder="Code" required="">
			@if(Session::has('error'))
				<div class='custom-infomation-error'>
				{{ Session::get('error') }}
				</div>
			@endif
			<input type="hidden" class="ggg" name="email" value="{{ session('email') }}" placeholder="Code" required="">
				<div class="clearfix"></div>
				<input type="submit" value="Xác Thực" name="login">
				<h6><a href="{{ route('back.to.email') }}">Nhập lại email</a></h6>
		</form>
	@endif
</div>
</div>
<script src="{{ asset('backend/asset/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/asset/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('backend/asset/js/scripts.js') }}"></script>
<script src="{{ asset('backend/asset/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('backend/asset/js/jquery.nicescroll.js') }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{ asset('backend/asset/js/jquery.scrollTo.js') }}"></script>
</body>
</html>
