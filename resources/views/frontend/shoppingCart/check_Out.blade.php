@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <!-- Popular Products -->
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container"> 
        
        <!-- Payments Steps -->
        <div class="shopping-cart"> 
            <!-- SHOPPING INFORMATION -->
            <div class="cart-ship-info">
                <div class="row"> 
                    <!-- ESTIMATE SHIPPING & TAX -->
                    <div class="col-sm-7 order-info">
                        <h6>THÔNG TIN THANH TOÁN</h6>
                        <form>
                            @csrf
                            <ul class="row">
                                <!-- Name -->
                                <li class="col-md-6">
                                    <label> *HỌ VÀ TÊN
                                    <input type="text" name="name" value="{{ $user->last_name.' '.$user->first_name }}"
                                            placeholder="" id="info-order-name">
                                    </label>
                                </li>
                                <!-- EMAIL ADDRESS -->
                                <li class="col-md-6">
                                    <label> *ĐỊA CHỈ EMAIL
                                    <input type="email" name="email" value="{{ $user->email }}"
                                            id="info-order-email" required>
                                    </label>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </li>
                                <!-- PHONE -->
                                <li class="col-md-6">
                                    <label> *SỐ ĐIỆN THOẠI
                                    <input type="number" name="number-phone" value="{{ $user->telephone }}" 
                                            id="info-order-telephone" required>
                                    </label>
                                    @error('number-phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </li>
                                {{-- city --}}
                                <li class="col-md-6">
                                    <label> *TỈNH/THÀNH PHỐ
                                    <select class="select-form choose-city" name="city"  id="info-order-city" required>
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
                                {{-- district --}}
                                <li class="col-md-6">
                                    <label> *QUẬN HUYỆN
                                    <select class="select-form choose-district" name="district" 
                                            id="info-order-district" required>
                                        <option value="{{ $district->id }}" selected>{{ $district->name }}</option>
                                    </select>
                                    </label>
                                    @error('district')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </li>
                                {{-- address --}}
                                <li class="col-md-6">
                                    <label> *ĐỊA CHỈ
                                    <input type="text" name="address" value="{{ $user->address }}" 
                                            id="info-order-address" required>
                                    </label>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </li>
                                <!-- SUBMIT -->
                                <li class="col-md-6">
                                </li>
                            </ul>
                        </form>
                        <button type="submit" class="btn">GIỎ HÀNG</button>
                        <button type="submit" class="btn btn-order-info-default">THÔNG TIN THANH TOÁN MẶC ĐỊNH</button>
                        <!-- SHIPPING info -->
                    </div>
                    <div class="col-md-7 order-info-default">
                        <h6>THÔNG TIN THANH TOÁN(Mặc định)</h6>
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
                        <button type="button" class="btn ">GIỎ HÀNG</button>
                        <button type="button" class="btn btn-order-info">THÔNG TIN THANH TOÁN KHÁC</button>
                    </div>
                    
                    <!-- SUB TOTAL -->
                    <div class="col-sm-5">
                        <h6>ĐƠN HÀNG CỦA BẠN</h6>
                        <div class="order-place">
                            <div class="order-detail">
                                @if (Session::has('cart'))
                                    @if (!isset($subTotal))
                                    @php
                                        $defaultSubTotal = 0;
                                    @endphp
                                    @endif
                                    @foreach (Session::get('cart') as $keyProduct => $valueProduct)
                                        <div id="product-detail-total-id-{{  $valueProduct['session_id']  }}" >
                                            <p >{{ $valueProduct['product_name'] }}
                                                <span id="total-product-detail-id-{{ $valueProduct['session_id'] }}">{{ number_format($valueProduct['product_price']*$valueProduct['product_quantity']) }} VND</span>
                                            </p>
                                        </div>
                                        @if ( isset($defaultSubTotal))
                                        @php
                                            $defaultSubTotal += ($valueProduct['product_price']*$valueProduct['product_quantity']);
                                        @endphp
                                        @endif
                                    @endforeach
                                @endif
                                <p>PHÍ VẬN CHUYỂN <span id="bill-fee-ship-id">{{ number_format($feeShip->fee) }} VND</span></p>
                                @if ( isset($defaultSubTotal))
                                @php
                                    $defaultSubTotal -= $feeShip->fee ;
                                @endphp
                                @endif
                                <!-- SUB TOTAL -->
                                @if (Session::has('cart'))
                                    @if (isset($subTotal))
                                    <p class="all-total">TỔNG TIỀN  <span id="subtotal-detail"> {{ number_format($subTotal) }} VND</span></p>
                                    @else
                                    <p class="all-total">TỔNG TIỀN  <span id="subtotal-detail"> {{ number_format($defaultSubTotal) }} VND</span></p>
                                    @endif
                                @endif
                                <ul>
                                    <li>
                                        <div class="radio">
                                            <input type="radio" name="radio1" id="radio1" value="0" checked>
                                            <label for="radio1"> THANH TOÁN KHI NHẬN HÀNG </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio">
                                            <input type="radio" name="radio1" id="radio2" value="1">
                                            <label for="radio2"> KHÁC</label>
                                        </div>
                                    </li>
                                </ul>
                                </div class="pay-meth">
                                    <a href="Javascript:" class="btn btn-dark pull-right margin-top-30" id="btn-place-order-id">ĐẶT HÀNG</a> </div>
                                </div>
                            </div>
                            {{-- <div class="pay-meth">
                            <a href="#." class="btn  btn-dark pull-right margin-top-30"></a> </div> --}}
                        </div>
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
        $('.order-info').css("display","none")
        $('.delete-cart-sidebar').css("display","none")
        // $('#form-update-profile').css("display","none")
    })
    $(document).on('click', ".btn-order-info", function(){
        $('.order-info-default').css("display","none")
        $('.order-info').css("display","inline");
    })  
    $(document).on('click', ".btn-order-info-default", function(){
        $('.order-info-default').css("display","inline")
        $('.order-info').css("display","none");
    })  
</script>

<script>

    $('.choose-city').on('change', function(){
        let cityId = $(this).val();
        $.ajax({
            url: '/change-fee-ship/'+cityId,
            type:'GET',
            success: function(response)
            {
                $('#bill-fee-ship-id').html(response['fee']+' VND');
                $("#subtotal-detail").html(response['subTotal']+' VND');
            },
            error: function(error)
            {
                console.log(error);
            }
        })
    })
</script>

<script>
    $(document).on('click', '#btn-place-order-id', function(e) {
        let name = $('#info-order-name').val();
        let email = $('#info-order-email').val();
        let telephone = $('#info-order-telephone').val();
        let address = $('#info-order-address').val();
        let district = $('#info-order-district').find(":selected").val();
        let city = $('#info-order-city').find(":selected").val();
        let payment = $("input[name='radio1']:checked").val();
        let _token = $('input[name = "_token"]').val();
        let hasValid = false;

        if( name.trim().length != 0 && email.trim().length != 0 && telephone.trim().length != 0 && address.trim().length != 0)
        {
            // e.preventDefault();
            if(payment == 0)
            {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "cart/place-order",
                    data: {
                        name:name,
                        email:email,
                        telephone:telephone,
                        address:address,
                        district:district,
                        city:city,
                        _token:_token,
                    },
                    success: function(response){
                        $('#content').html(response);
                        $('.change-item-cart').css('display','none');
                    },
                    error: function(error){
                        console.log(error);
                    }
                })
            }else
                {
                    alertify.alert('Vui lòng chọn phương thức thanh toán khi nhận hàng',
                                        'Chúng tôi sẽ phát triển các phương thức thanh toán khác trong thời gian tới', function(){ alertify.success('OK'); });
                }
        }else
            {
                alertify.error('vui lòng nhập đủ thông tin');
            }

    })
</script>
@endsection