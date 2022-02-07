@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <!-- Popular Products -->
    <section class="padding-top-100 padding-bottom-100">
    <div class="container"> 
        
        <!-- SHOP DETAIL -->
        <div class="shop-detail">
        <div class="row"> 
            
            <!-- Popular Images Slider -->
            <div class="col-md-7"> 
            
            <!-- Images Slider -->
            <?php 
                $images = explode("|", $product->image);
            ?>
            <div class="images-slider">
                <ul class="slides">
                @foreach ($images as $image)
                <li data-thumb="{{ Storage::disk('products')->url($image) }}">
                    <img class="img-1" style="width: 100%;" src="{{ Storage::disk('products')->url($image) }}" alt="" >
                </li>
                @endforeach
                </ul>
            </div>
            </div>
            
            <!-- COntent -->
            <div class="col-md-5">
            <h4>{{ $product->name }}</h4>
            <span class="price"><small>đ</small>{{ number_format($product->price) }}</span> 
            
            <!-- Sale Tags -->
            <div class="">  </div>
            <ul class="item-owner">
                @if ( $product->status == 0)
                <li>Trạng thái :<span>New FuLL Box</span></li>
                @else
                <li>Trạng thái: <span>Cũ 99%</span></li>
                @endif
                <li>Kích thước màn hình: <span>{{ $product->screen_size }}</span> inch</li>
                <li>Độ phân giải màn hình: <span>{{ $product->screen_resolution }}</span></li>
                <li>Camera trước: <span>{{ $product->front_camera }}</span> mpx</li>
                <li>Camera sau: <span>{{ $product->rear_camera }}</span> mpx</li>
                <li>Kích Thước: <span>{{ $product->size }}</span></li>
                <li>Ram: <span>{{ $product->ram }}</span> mpx</li>
                <li>Bộ nhớ Trong: <span>{{ $product->ram }}</span> GB</li>
                <li>Bộ nhớ Trong: <span>{{ $product->rom }}</span> GB</li>
                @if ( $product->waterproof == 0)
                <li>Chống nước :<span>Không</span></li>
                @else
                <li>Chống nước: <span>Có</span></li>
                @endif
            </ul>
            
            <!-- Item Detail -->
            <p></p>
            
            <!-- Short By -->
            <div class="some-info">
                <ul class="row margin-top-30">
                    <form action="">
                        @csrf
                        <div>
                            {{-- id --}}
                            <input type="hidden" name="" 
                                    value="{{ $product->id }}" class="cart_product_id_{{ $product->id }}">
                            {{-- name --}}
                            <input type="hidden" name="" 
                                value="{{ $product->name }}" class="cart_product_name_{{ $product->id }}">
                            {{-- image --}}
                            <input type="hidden" name="" 
                                value="{{ $images['0'] }}" class="cart_product_image_{{ $product->id }}">
                            {{-- price --}}
                            <input type="hidden" name="" 
                                value="{{ $product->price }}" class="cart_product_price_{{ $product->id }}">
                            {{-- quantity --}}
                            {{-- <input type="hidden" name="" 
                                value="1" class="cart_product_quantity_{{$product['id']}}"> --}}
                        </div>

                        <li class="col-xs-4">
                            <div class="quinty"> 
                            <!-- QTY -->
                                <select name="" class="select-form-page-detail cart_product_quantity_{{ $product->id }}">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </li>
                        
                        <!-- COLORS -->
                        <li class="col-xs-8">
                            <ul class="colors-shop">
                                <li><span class="margin-right-20">Colors: </span></li>
                                <li><span>{{ $product->color }}</span></li>
                            </ul>
                        </li>
                        
                        <!-- ADD TO CART -->
                        <li class="col-xs-6">
                            <button class="btn add-to-cart" data-id="{{ $product['id'] }}">
                                ADD TO CART
                            </button>
                        </li>
                    </form>
                    
                    <!-- LIKE -->
                    {{-- <li class="col-xs-6"> <a href="#." class="like-us"><i class="icon-heart"></i></a> </li> --}}
                </ul>
                
                <!-- INFOMATION -->
                <div class="inner-info">
                <p></p>
                <h6></h6>
                
                <!-- Social Icons -->
                <ul class="social_icons">
                    <li><a href="https://www.facebook.com/Apple-Store-102817295515488/"><i class="icon-social-facebook"></i></a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
        
        <!--======= PRODUCT DESCRIPTION =========-->
        <div class="item-decribe"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs animate fadeInUp" data-wow-delay="0.4s" role="tablist">
            <li role="presentation" class="active"><a href="#descr" role="tab" data-toggle="tab">Mô Tả</a></li>
            <li role="presentation"><a href="#review" role="tab" data-toggle="tab">Bình Luận</a></li>
            <li role="presentation"><a href="#tags" role="tab" data-toggle="tab">Thông tin sản phẩm</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content animate fadeInUp" data-wow-delay="0.4s"> 
            <!-- DESCRIPTION -->
            <div role="tabpanel" class="tab-pane fade in active" id="descr">
            {{ $product->desc }}
            </div>
            
            <!-- REVIEW -->
            <div role="tabpanel" class="tab-pane fade" id="review">
            
                <div class="fb-comments" data-href="{{ route('frontend.product.show', $product->id) }}" 
                    data-width="100%" data-numposts="5" data-order-by="time"></div>
            

            <!-- ADD REVIEW -->
            </div>
            
            <!-- TAGS -->
            <div role="tabpanel" class="tab-pane fade custom-image-infomation-product" id="tags" style="width:95%">
                {!! $product->infomation !!}
            </div>
        </div>
        </div>
    </div>
    </section>
    
    <!-- Popular Products -->
    <section class="light-gray-bg padding-top-150 padding-bottom-150">
    <div class="container"> 
        
        <!-- Main Heading -->
        <div class="heading text-center">
            <h4>Các Sản Phẩm Liên Quan</h4>
        </div>
        
        <!-- Popular Item Slide -->
        <div class="papular-block block-slide single-img-demos"> 
        @foreach ( $products as $productItem)
        <!-- Item -->
        <div class="item"> 
            <!-- Item img -->
            <?php
                $productImages = explode("|",$productItem['image']);
            ?>
            <div class="brem-image-index" >
                <div class="item-img">
                    <img class="img-1" style="width: 100%px;object-fit:cover" src="{{ Storage::disk('products')->url($productImages['0'])  }}" alt="" > 
                    <!-- Overlay -->
                    <div class="overlay">
                        <div class="position-center-center">
                            <form action="">
                                @csrf
                                <div>
                                    {{-- id --}}
                                    <input type="hidden" name="" 
                                            value="{{$productItem['id']}}" class="cart_product_id_{{$productItem['id']}}">
                                            {{-- name --}}
                                    <input type="hidden" name="" 
                                        value="{{$productItem['name']}}" class="cart_product_name_{{$productItem['id']}}">
                                    {{-- image --}}
                                    <input type="hidden" name="" 
                                        value="{{$productImages['0']}}" class="cart_product_image_{{$productItem['id']}}">
                                    {{-- price --}}
                                    <input type="hidden" name="" 
                                        value="{{$productItem['price']}}" class="cart_product_price_{{$productItem['id']}}">
                                    {{-- quantity --}}
                                    <input type="hidden" name="" 
                                        value="1" class="cart_product_quantity_{{$productItem['id']}}">
                                </div>
                                <button class="inn custom-btn-add-cart add-to-cart" data-id="{{ $productItem['id'] }}">
                                    <i class="icon-basket"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item Name -->
            <div class="item-name">
                <a href="{{ route('frontend.product.show', $productItem['id']) }}">{{ $productItem['name'] }}</a>
                <p>{{ $productItem['desc'] }}</p>
            </div>
            <!-- Price --> 
            <span class="price"><small>đ</small>{{ number_format($productItem['price']) }}</span> 
        </div>
        @endforeach
    </div>
    </section>
</div>

        
@endsection
@section('insert-script')

@endsection