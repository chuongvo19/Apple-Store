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
                    <h6>Xác Thực Email</h6>
                    @if(Session::has('error'))
                        <div class='alert alert-danger'>
                        {{ Session::get('error') }}
                        </div><br>
                    @endif
                    @if(Session::has('notification'))
                        <div class='alert alert-success'>
                        {{ Session::get('notification') }}
                        </div><br>
                    @endif
                    @if (!Session::has('confirm'))
                    <form method="post" action="{{ route('frontend.forgot.password') }}">
                        @csrf
                        <ul class="row">
                        <!-- Name -->
                            <li class="col-md-12">
                                <label> NHẬP EMAIL CỦA BẠN ĐỂ TIẾN HÀNH XÁC THỰC
                                    <input type="email" name="email" value="" placeholder="">
                                    @error('email')
                                        <div class="custom-infomation-error">{{ $message }}</div>
                                    @enderror
                                </label>
                            </li>
                            <!-- LOGIN -->
                            <li class="col-md-4">
                                <button type="submit" class="btn">Xác Thực</button>
                            </li>
                            <!-- FORGET PASS -->
                            <li class="col-md-4">
                                <div class="checkbox margin-0 margin-top-20 text-right">
                                    <a href="{{ route('frontend.login') }}">Back</a>
                                </div>
                            </li>
                        </ul>
                    </form>
                    @else
                    <form method="post" action="{{ route('frontend.reset.password.form') }}">
                        @csrf
                        <ul class="row">
                        <!-- Name -->
                            <li class="col-md-12">
                                <label for="">CHÚNG TÔI VỪA GỬI MÃ XÁC THỰC VỀ EMAIL</label>
                                <label> NHẬP MÃ XÁC THỰC
                                    <input type="text" name="token" value="" placeholder="">
                                    <input type="hidden" name="email" value="{{ session('email') }}" placeholder="">
                                    @error('token')
                                        <div class="custom-infomation-error">{{ $message }}</div>
                                    @enderror
                                </label>
                            </li>
                            <!-- LOGIN -->
                            <li class="col-md-4">
                                <button type="submit" class="btn">Xác Thực</button>
                            </li>
                            <!-- FORGET PASS -->
                            <li class="col-md-4">
                                <div class="checkbox margin-0 margin-top-20 text-right">
                                    <a href="{{ route('frontend.back.to.email') }}">Nhập lại Email</a>
                                </div>
                            </li>
                        </ul>
                    </form>
                    @endif
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
            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odio luctus non. Nulla lacinia,
            eros vel fermentum consectetur, risus purus tempc, et iaculis odio dolor in ex. </p>
        </div>
        <!-- Social Icons -->
        <ul class="social_icons">
            <li><a href="#."><i class="icon-social-facebook"></i></a></li>
            <li><a href="#."><i class="icon-social-twitter"></i></a></li>
            <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
            <li><a href="#."><i class="icon-social-youtube"></i></a></li>
            <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
        </ul>
        </div>
    </section>
@endsection