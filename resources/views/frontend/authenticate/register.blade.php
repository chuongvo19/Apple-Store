@extends('frontend.authenticate.layouts.app')
@section('content')
    <!--======= PAGES INNER =========-->
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
            
            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info register">
            <div class="row"> 
                
                <!-- ESTIMATE SHIPPING & TAX -->
                <div class="col-sm-12">
                <h6>ĐĂNG KÝ TÀI KHOẢN</h6>
                @if(Session::has('notification'))
                    <div class='alert alert-success'>
                    {{ Session::get('notification') }}
                    </div><br>
                @endif
                    <form action="{{ route('frontend.register') }}" method="POST">
                        @csrf
                        <ul class="row">
                        
                            <!-- username -->
                            <li class="col-md-12">
                                <label> *TÊN NGƯỜI DÙNG
                                <input type="text" name="user-name" value="" placeholder="" required>
                                </label>
                                @error('user-name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <!-- Name -->
                            <li class="col-md-6">
                                <label> *TÊN
                                <input type="text" name="first-name" value="" placeholder="" required>
                                </label>
                                @error('first-name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <!-- LAST NAME -->
                            <li class="col-md-6">
                                <label> *HỌ
                                <input type="text" name="last-name" value="" placeholder="" required>
                                </label>
                                @error('last-name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            
                            <!-- EMAIL ADDRESS -->
                            <li class="col-md-6">
                                <label> *ĐỊA CHỈ EMAIL
                                <input type="email" name="email" value="" placeholder="" required>
                                </label>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <!-- PHONE -->
                            <li class="col-md-6">
                                <label> *SỐ ĐIỆN THOẠI
                                <input type="number" name="number-phone" value="" placeholder="" required>
                                </label>
                                @error('number-phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            
                            <!-- password -->
                            <li class="col-md-6">
                                <label> *MẬT KHẨU
                                <input type="password" name="password" value="" placeholder="" required>
                                </label>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            
                            <!-- password confirm -->
                            <li class="col-md-6">
                                <label> *NHẬP LẠI MẬT KHẨU
                                <input type="password" name="password_confirmation" value="" placeholder="" required>
                                </label>
                                @error('upassword_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </li>
                            <!-- PHONE -->
                            <li class="col-md-6">
                                <button type="submit" class="btn">ĐĂNG KÝ</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection