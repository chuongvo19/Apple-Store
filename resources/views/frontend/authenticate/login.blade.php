@extends('frontend.authenticate.layouts.app')
@section('content')
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container"> 
        <!-- Payments Steps -->
        <div class="shopping-cart">
            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info">
            <div class="row">
                <div class="col-sm-2"></div>
                <!-- ESTIMATE SHIPPING & TAX -->
                <div class="col-sm-8">
                    <h6>ĐĂNG NHẬP</h6>
                    @if(Session::has('error'))
                        <div class='custom-infomation-error'>
                        {{ Session::get('error') }}
                        </div><br>
                    @endif
                    @if(Session::has('notification'))
                        <div class='alert alert-success'>
                        {{ Session::get('notification') }}
                        </div><br>
                    @endif
                    <form method="post" action="{{ route('frontend.authenticate.login') }}">
                        @csrf
                        <ul class="row">
                        <!-- Name -->
                            <li class="col-md-12">
                                <label> EMAIL
                                    <input type="email" name="email" value="" placeholder="">
                                    @error('email')
                                        <div class="custom-infomation-error">{{ $message }}</div>
                                    @enderror
                                </label>
                            </li>
                            <!-- LAST NAME -->
                            <li class="col-md-12">
                                <label> MẬT KHẨU
                                    <input type="password" name="password" value="" placeholder="">
                                    @error('password')
                                        <div class="custom-infomation-error">{{ $message }}</div>
                                    @enderror
                                </label>
                            </li>
                            
                            <!-- LOGIN -->
                            <li class="col-md-4">
                                <button type="submit" class="btn">ĐĂNG NHẬP</button>
                            </li>
                            
                            <!-- CREATE AN ACCOUNT -->
                            <li class="col-md-4">
                                <div class="checkbox margin-0 margin-top-20">
                                    <input id="checkbox1" class="styled" type="checkbox" name="remember_token">
                                    <label for="checkbox1"> Nhớ đăng nhập</label>
                                </div>
                            </li>
                            <!-- FORGET PASS -->
                            <li class="col-md-4">
                                <div class="checkbox margin-0 margin-top-20 text-right">
                                    <a href="{{ route('frontend.show.forgot.password') }}">Quên mật khẩu</a>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- SUB TOTAL -->
                <div class="col-sm-2"></div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- About -->
    <section class="small-about padding-top-150 padding-bottom-150">
        <div class="container"> 
        <!-- Main Heading -->
        <div class="heading text-center">
            <h4>APPLE STORE</h4>
            <p>“Revs your Heart” – “Khởi dậy đam mê”</p>
        </div>
        <!-- Social Icons -->
        <ul class="social_icons">
            <li><a href="https://www.facebook.com/Apple-Store-102817295515488/"><i class="icon-social-facebook"></i></a></li>
        </ul>
        </div>
    </section>
@endsection