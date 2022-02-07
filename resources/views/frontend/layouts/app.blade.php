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
<link rel="icon" type="image/png" href="{{ asset('frontend/asset/images/icon-apple-store.png') }}">

<!-- Bootstrap Core CSS -->
<link href="{{ asset('frontend/asset/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('frontend/asset/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('frontend/asset/css/ionicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/css/main.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/asset/css/responsive.css') }}" rel="stylesheet">
<!-- CSS -->
<link rel="stylesheet" href="{{ asset('frontend/asset/alertifyjs/css/alertify.min.css') }}"/>
<!-- Default theme -->
<link rel="stylesheet" href="{{ asset('frontend/asset/alertifyjs/css/themes/default.min.css') }}"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="{{ asset('frontend/asset/alertifyjs/css/themes/semantic.min.css') }}"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="{{ asset('frontend/asset/alertifyjs/css/themes/bootstrap.min.css') }}"/>
{{--  --}}
@yield('css-cart-page')
<!-- JavaScripts -->
<script src="{{ asset('frontend/asset/js/modernizr.js') }}"></script>

<!-- Online Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="{{ asset('frontend/asset/css/sweetalert.css') }}" rel="stylesheet">
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
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="pTw7ZSox"></script>
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
<script src="{{ asset('frontend/asset/js/sweetalert.min.js') }}"></script>
@yield('insert-script')

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('frontend/asset/rs-plugin/js/jquery.tp.t.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/asset/rs-plugin/js/jquery.tp.min.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/main.js') }}"></script> 
<script src="{{ asset('frontend/asset/js/main.js') }}"></script>
<!-- JavaScript -->
<script src="{{ asset('frontend/asset/alertifyjs/alertify.min.js') }}"></script>

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "102817295515488");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>


<script type="text/javascript">
    $(".add-to-cart").on('click', '', function(){
      let id = $(this).data('id');
      let cart_product_id = $('.cart_product_id_' + id).val();
      let cart_product_name = $('.cart_product_name_' + id).val();
      let cart_product_image = $('.cart_product_image_' + id).val();
      let cart_product_price = $('.cart_product_price_' + id).val();
      let cart_product_quantity = $('.cart_product_quantity_' + id).val();
      let _token = $('input[name = "_token"]').val();
      event.preventDefault();
      // alert(cart_product_quantity)
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: "POST",
          url: "/add-to-cart",
          data: {
            cart_product_id:cart_product_id,
            cart_product_name:cart_product_name,
            cart_product_price:cart_product_price,
            cart_product_quantity:cart_product_quantity,
            cart_product_image:cart_product_image,
            _token:_token,
          },
          success: function(response){
            swal("Thành Công", "Bạn đã thêm 1 sản phẩm vào giỏ hàng", "success");
            $(".change-item-cart").replaceWith(response);
          },
          error: function(error){
              console.log(error);
          }
      })
    })
</script>

<script type="text/javascript">
    $(document).on('click', '.delete-cart-sidebar', function(e) {
      let sessionId = $(this).data('id-session');
      $.ajax({
        url: '/deleteProductCart/'+sessionId,
        type:'GET',
        success: function(response)
        {
          $("#product-cart-sidebar-"+sessionId).empty();
          $("#subtotal-cart").html('SUBTOTAL: '+response['sub-total']+'đ');
          $(".cart-number-bage").html(response['count-sibar']);

          if ($("#product-detail-total-id-"+sessionId).length > 0) {
            $("#product-detail-total-id-"+sessionId).empty();
          }
          if ($("#product-detail-id-"+sessionId).length > 0) {
            $("#product-detail-id-"+sessionId).empty();
          }
          if ($("#subtotal-detail").length > 0) {
            $("#subtotal-detail").html('SUBTOTAL: '+response['sub-total']+'đ');
          }
          alertify.success('Xóa sản phẩm thành công');
        },
        error: function(error)
        {
          console.log(error);
        }
      })
    })
  // })
</script>

<script type="text/javascript">
    $(document).on('click', '.delete-product-detail', function(e) {
    // $(".delete-product-detail").click(function(){
      let sessionId = $(this).data('id-session');
      $.ajax({
        url: 'deleteProductCart/'+sessionId,
        type:'GET',
        success: function(response)
        {
          $("#product-detail-id-"+sessionId).empty();
          $("#product-detail-total-id-"+sessionId).empty();
          $("#product-cart-sidebar-"+sessionId).empty();
          $("#subtotal-detail").html('SUBTOTAL: '+response['sub-total']+'đ');
          $("#subtotal-cart").html('SUBTOTAL: '+response['sub-total']+'đ');
          $(".cart-number-bage").html(response['count-sibar']);

          alertify.success('Xóa sản phẩm thành công');
        },
        error: function(error)
        {
          console.log(error);
        }
      })
    })
</script>

<script>
  $('.choose-city').on('change', function(){
    let cityId = $(this).val();
    $.ajax({
      url: '/select-city/'+cityId,
      type:'GET',
      success: function(response)
        {
          $('.choose-district').html(response)
        },
        error: function(error)
        {
          console.log(error);
        }
    })
  })
</script>
</body>
</html>