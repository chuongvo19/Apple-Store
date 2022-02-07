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
                {{-- active --}}
            <li class="dropdown "> <a href="{{ route('frontend.index') }}">TRANG CHỦ</a></li>
            <li class="dropdown"> <a href="#." class="dropdown-toggle" data-toggle="dropdown">DANH MỤC</a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li> <a href="{{ route('frontend.category.index', $category['id']) }}">{{ $category['name_category'] }}</a> </li>
                    @endforeach
                </ul>
            </li>
            {{-- <li> <a href="about-us_01.html">BLOG </a> </li> --}}
            <!-- Two Link Option -->
            <li> <a href="{{ route('frontend.show.contact') }}">liên hệ</a> </li>
            </ul>
        </div>
        
        <!-- Nav Right -->
        <div class="nav-right">
            <ul class="navbar-right">
            
            <!-- USER INFO -->
                <li class="dropdown user-acc"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" ><i class="icon-user"></i> </a>
                    <ul class="dropdown-menu">
                        @if (Auth::check())
                        <li>
                            <h6>HELLO! {{ Auth::user()->user_name }}</h6>
                        </li>
                        <li><a href="{{ route('frontend.user.profile') }}">THÔNG TIN NGƯỜI DÙNG</a></li>
                        <li><a href="{{ route('user.show.change.password') }}">THAY ĐỔI MẬT KHẨU</a></li>
                        <li><a href="{{ route('frontend.show.order') }}">KIỂM TRA ĐƠN HÀNG</a></li>
                        <li><a href="{{ route('logout') }}">ĐĂNG XUẤT</a></li>
                        @else
                        <li>
                            <h6>HELLO! GUEST</h6>
                        </li>
                        <li><a href="{{ route('frontend.login') }}">ĐĂNG NHẬP</a></li>
                        @endif
                    </ul>
                </li>
                
                <!-- USER BASKET -->
                @include('frontend.shoppingCart._cart-sidebar')
                <!-- SEARCH BAR -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="search-open">
                        <i class=" icon-magnifier"></i>
                    </a>
                    <div class="search-inside animated bounceInUp">
                        <i class="icon-close search-close"></i>
                        <div class="search-overlay"></div>
                        <div class="position-center-center">
                            <div class="search">
                                <form action="{{ route('frontend.index.search') }}" method="POST">
                                    @csrf
                                    <input type="search" name="search" placeholder="Tìm Kiếm Sản Phẩm">
                                    <button type="submit"><i class="icon-check"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
        </nav>
    </div>
    </div>
</header>