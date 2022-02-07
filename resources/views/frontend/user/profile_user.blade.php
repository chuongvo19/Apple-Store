@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container"> 
            <div class="row">
                <div class="col-md-12" id="table-profile">
                    {{-- infomation --}}
                    <h6>THÔNG TIN KHÁCH HÀNG</h6>
                    @if(Session::has('notification'))
                    <div class='alert alert-success'>
                        {{ Session::get('notification') }}
                    </div><br>
                    @endif
                    @if(Session::has('error'))
                    <div class='alert alert-danger'>
                        {{ Session::get('error') }}
                    </div><br>
                    @endif
                    <table class="table table-bordered">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <th>Họ Tên</th>
                                <td>{{ $user->last_name.' '.$user->first_name }}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Số Điện Thoại</th>
                                <td>{{ $user->telephone }}</td>
                            </tr>
                            <tr>
                                <th>Địa Chỉ</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>Quận Huyện</th>
                                <td>{{ $district->name }}</td>
                            </tr>
                            <tr>
                                <th>Tỉnh/Thành Phố</th>
                                @foreach ($citys as $city)
                                    @if ($user->city_id == $city['id'])
                                    <td>{{ $city['name'] }}</td>
                                    @endif
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <br><button type="button" class="btn" id="btn-show-update-profile">CẬP NHẬT THÔNG TIN</button>
                </div>
                {{-- update form profile--}}
                <div class="col-sm-12 shopping-cart" id="form-update-profile">
                    <h6>CẬP NHẬT THÔNG TIN</h6>
                        <div class="cart-ship-info">
                            <form action="{{ route('frontend.user.update-profile') }}" method="POST" id="form-update-profile">
                                @csrf
                                <ul class="row">
                                    <!-- username -->
                                    <li class="col-md-6">
                                        <label> *TÊN NGƯỜI DÙNG
                                        <input type="text" name="user-name" value="{{ $user->user_name }}" required>
                                        </label>
                                        @error('user-name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <!-- Name -->
                                    <li class="col-md-6">
                                        <label> *TÊN
                                        <input type="text" name="first-name" value="{{ $user->first_name }}" required>
                                        </label>
                                        @error('first-name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <!-- LAST NAME -->
                                    <li class="col-md-6">
                                        <label> *HỌ
                                        <input type="text" name="last-name" value="{{ $user->last_name }}" required>
                                        </label>
                                        @error('last-name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    
                                    <!-- EMAIL ADDRESS -->
                                    <li class="col-md-6">
                                        <label> *ĐỊA CHỈ EMAIL
                                        <input type="email" name="email" value="{{ $user->email }}" required>
                                        </label>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <!-- PHONE -->
                                    <li class="col-md-6">
                                        <label> *SỐ ĐIỆN THOẠI
                                        <input type="number" name="number-phone" value="{{ $user->telephone }}" required>
                                        </label>
                                        @error('number-phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    {{-- address --}}
                                    <li class="col-md-6">
                                        <label> *ĐỊA CHỈ
                                        <input type="text" name="address" value="{{ $user->address }}" >
                                        </label>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    {{-- district --}}
                                    <li class="col-md-6">
                                        <label> *QUẬN HUYỆN
                                        <select class="select-form choose-district" name="district" id="" >
                                            <option value="{{ $district->id }}" selected>{{ $district->name }}</option>
                                        </select>
                                        </label>
                                        @error('district')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    {{-- city --}}
                                    <li class="col-md-6">
                                        <label> *TỈNH/THÀNH PHỐ
                                        <select class="select-form choose-city" name="city" id="" >
                                            @foreach ( $citys as $city )
                                                @if ( $user->city_id == $city['id'])
                                                <option value="{{ $city['id'] }}" selected>{{ $city['name'] }}</option>
                                                @endif
                                                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                                            @endforeach
                                        </select>
                                        </label>
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <!-- PHONE -->
                                    <li class="col-md-6">
                                        <button type="submit" class="btn">CẬP NHẬT</button>
                                        <button type="button" class="btn" id="btn-show-profile">TRỞ VỀ</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</div>  
@endsection
@section('insert-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.sub-bnr').css("display","none")
            $('#form-update-profile').css("display","none")
        })
        $(document).on('click', "#btn-show-update-profile", function(){
            $('#table-profile').css("display","none");
            $('#form-update-profile').css("display","block")
        })  
        $(document).on('click', "#btn-show-profile", function(){
            $('#table-profile').css("display","block");
            $('#form-update-profile').css("display","none")
        })  
    </script>
@endsection