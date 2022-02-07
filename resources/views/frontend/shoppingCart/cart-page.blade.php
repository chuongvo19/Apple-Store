@extends('frontend.layouts.app')
@section('css-cart-page')
<style>
    @media only screen and (max-width: 414px){
        .custom-font-size{
            font-size: 9px;
        }
        .shopping-cart .price{
            font-size: 9px
        }
    }
</style>
@endsection
@section('content')
<div id="content"> 
    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100 pages-in chart-page">
        <div class="container"> 
        
        <!-- Payments Steps -->
            <div class="shopping-cart text-center">
                <div class="cart-head">
                    <ul class="row">
                        <!-- PRODUCTS -->
                        <li class="col-md-2 col-xs-2 text-left">
                            <h6>SẢN PHẨM</h6>
                        </li>
                        <!-- NAME -->
                        <li class="col-md-4 col-xs-3 ">
                            <h6>TÊN SẢN PHẨM</h6>
                        </li>
                        <!-- PRICE -->
                        <li class="col-md-2 col-xs-2">
                            <h6>GIÁ</h6>
                        </li>
                        <!-- QTY -->
                        <li class="col-md-1 col-xs-2">
                            <h6>SỐ LƯỢNG</h6>
                        </li>
                        
                        <!-- TOTAL PRICE -->
                        <li class="col-md-2 col-xs-2">
                            <h6>TỔNG TIỀN</h6>
                        </li>
                        <li class="col-md-1 col-xs-1"> </li>
                    </ul>
                </div>
                
                <!-- Cart Details -->
                
                
                <!-- Cart Details -->
                @if (Session::has('cart'))
                @foreach (Session::get('cart') as $keyProduct => $valueProduct)
                <div id="product-detail-id-{{  $valueProduct['session_id']  }}">    
                    <ul class="row cart-details">
                        <li class="col-md-2 col-xs-2">
                            <div class="media"> 
                                <!-- Media Image -->
                                <div class="media-left media-middle position-center-center">
                                    <a href="#." class="">
                                        <img class="media-object " src="{{ Storage::disk('products')->url($valueProduct['product_image']) }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="col-md-4 col-xs-3">
                            <div class="media"> 
                                <!-- Item Name -->
                                <div class="">
                                    <div class="position-center-center" >
                                        <h5 class="custom-font-size">{{ $valueProduct['product_name'] }}</h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <!-- PRICE -->
                        <li class="col-md-2 col-xs-2">
                            <div class="position-center-center">
                                <span class="custom-font-size price "><small>đ</small>{{ number_format($valueProduct['product_price']) }}</span>
                            </div>
                        </li>
                        
                        <!-- QTY -->
                        <li class="col-md-1 col-xs-2">
                            <div class="position-center-center">
                                <div class="quinty"> 
                                    <!-- QTY -->
                                    <div>
                                        <form class="form-quantity" id="form-quantity-id-{{ $valueProduct['session_id'] }}">
                                            @csrf
                                            <input type="hidden" name="session_id" value="{{ $valueProduct['session_id'] }}">
                                            <input type="number" name="product_quantity" 
                                                    value="{{ $valueProduct['product_quantity'] }}" min="1"class="update-product-quantity" 
                                                    onchange="$('#form-quantity-id-{{ $valueProduct['session_id'] }}').submit();">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <!-- TOTAL PRICE -->
                        <li class="col-md-2 col-xs-2">
                            <div class="position-center-center">
                                <span class="price custom-font-size" id="total-product-id-{{ $valueProduct['session_id'] }}" >
                                    <small>đ</small>
                                    {{ number_format($valueProduct['product_price']*$valueProduct['product_quantity']) }}
                                </span>
                            </div>
                        </li>
                        
                        <!-- REMOVE -->
                        <li class="col-md-1 col-xs-1">
                            <div class="position-center-center"> 
                                <i class="icon-close delete-product-detail" data-id-session="{{ $valueProduct['session_id'] }}"></i> 
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    
    <!--======= PAGES INNER =========-->
    <section class="padding-top-100 padding-bottom-100 light-gray-bg shopping-cart small-cart">
        <div class="container"> 
        
        <!-- SHOPPING INFORMATION -->
        <div class="cart-ship-info margin-top-0">
            <div class="row"> 
            
            <!-- DISCOUNT CODE -->
            <div class="col-md-7">
                {{-- <h6></h6> --}}
                {{-- <form>
                <input type="text" value="" placeholder="ENTER YOUR CODE IF YOU HAVE ONE">
                <button type="submit" class="btn btn-small btn-dark"><i class="far fa-plus-square"></i></button>
                </form> --}}
                <div class="coupn-btn">
                    <a href="{{ route('frontend.index') }}" class="btn">TIẾP TỤC MUA MUA SẮM</a>
                    {{-- <a href="#." class="btn">CẬP NHẬT GIỎ HÀNG</a>  --}}
                </div>
            </div>
            
            <!-- SUB TOTAL -->
            <div class="col-md-5">
                <h6>tổng tiền</h6>
                <div class="grand-total">
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
                    @else
                        @php
                            $defaultSubTotal = 0;
                        @endphp
                    @endif
                    <!-- SUB TOTAL -->
                    @if (isset($subTotal))
                    <p class="all-total">TỔNG TIỀN  <span id="subtotal-detail"> {{ number_format($subTotal) }} VND</span></p>
                    @else
                    <p class="all-total">TỔNG TIỀN  <span id="subtotal-detail"> {{ number_format($defaultSubTotal) }} VND</span></p>
                    @endif
                    </div>
                        <a href="{{ route('frontend.cart.check-out') }}" class="btn">Thanh toán</a> </div>
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
<script>
    $(".form-quantity").submit(function(event){
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "cart/update-quantity",
            data: $(this).serializeArray(),
            success: function(response){
                $("#subtotal-detail").html(response['sub-total']+'VND');
                $("#subtotal-cart").html('SUBTOTAL: '+response['sub-total']+'đ');
                $("#total-product-id-"+response['session_id']).html("<small>đ</small>"+response['total-product']); 
                $("#total-product-detail-id-"+response['session_id']).html(response['total-product']+" VND"); 
                $("#product-quantity-id-"+response['session_id']).html('QTY: '+response['product-quantity']); 
            },
            error: function(error){
                console.log(error);
            }
        })
    })
</script>
@endsection