@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container"> 
            <div class="row">
                
                {{-- update form profile--}}
                <div class="col-sm-12 shopping-cart" id="form-update-profile">
                    <div class="col-md-7">
                        <h6>THAY ĐỔI MẬT KHẨU</h6>
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
                        <div class="cart-ship-info">
                            <form action="{{ route('user.change.password') }}" method="POST" id="form-update-profile">
                                @csrf
                                <ul class="row">
                                    <!-- password -->
                                    <li class="col-md-12">
                                        <label> *MẬT KHẨU CŨ
                                            <input type="password" name="old-password" value=""  required>
                                        </label>
                                        @error('old-password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    
                                    <!-- password confirm -->
                                    <li class="col-md-12">
                                        <label> *MẬT KHẨU MỚI
                                        <input type="password" name="password" value=""  required>
                                        </label>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <!-- password confirm -->
                                    <li class="col-md-12">
                                        <label> *NHẬP LẠI MẬT KHẨU MỚI
                                            <input type="password" name="password_confirmation" value=""  required>
                                        </label>
                                        @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </li>
                                    <!-- PHONE -->
                                    <li class="col-md-6">
                                        <button type="submit" class="btn">THAY ĐỔI MẬT KHẨU</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
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
        }) 
    </script>
@endsection