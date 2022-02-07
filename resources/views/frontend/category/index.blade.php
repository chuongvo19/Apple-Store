@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <!-- Popular Products -->
    <!-- Products -->
    <section class="shop-page padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row"> 
                
                <!-- Shop SideBar -->
                @include('frontend.layouts._sidebar')
                
                <!-- Item Content -->
                <div class="col-sm-9">
                <div class="item-display">
                    <div class="row">
                        <div class="col-xs-6"> <span class="product-num"></span> </div>
                            <!-- Products Select -->
                        <div class="col-xs-6">
                            <div class="col-md-6"></div>
                            <div class="">
                                <div class="dropdown">
                                    <button class="btn-default dropdown-toggle custom-btn-search"
                                                type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Sắp xếp
                                    <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li><a href="{{ route('frontend.category.index', $id) }}">Sắp Xếp Theo</a></li>
                                        <li><a href="{{ route('frontend.category.index.asc', $id) }}">Giá từ thấp đến cao</a></li>
                                        <li><a href="{{ route('frontend.category.index.desc', $id) }}">Giá từ cao đến thấp</a></li>
                                    {{-- <li role="separator" class="divider"></li> --}}
                                    {{-- <li><a href="#">Separated link</a></li> --}}
                                    </ul>
                                </div>
                                {{-- <select id="select-search" class="input-sm form-control w-sm inline v-middle" name="sort">
                                    <option value=""><a href="{{ route('frontend.category.index', $id) }}">Sắp Xếp Theo</a></option>
                                    <option value=""><a href="{{ route('frontend.category.index.asc', $id) }}">Giá từ thấp đến cao</a></option>
                                    <option value=""><a href="{{ route('frontend.category.index.desc', $id) }}">Giá từ cao đến thấp</a></option>
                                </select>    --}}
                                {{-- <form id="form-search-index" action="{{ route('frontend.categories.sort', $id) }}" method="GET">
                                    @csrf
                                    <div class="col-sm-6 m-b-xs">
                                        <input type="hidden" name="category_id" value="{{ $id }}">
                                        <select id="select-search" class="input-sm form-control w-sm inline v-middle" name="sort"
                                                                    onchange="javascrip:this.form.submit()">
                                            @if ( $sort == 0 )
                                            <option value="0" selected>Sắp Xếp Theo</option>
                                            @else
                                            <option value="0">Sắp Xếp Theo</option>
                                            @endif
                                            @if ( $sort == 1)
                                            <option value="1" selected>Giá từ cao đến thấp</option>
                                            @else
                                            <option value="1">Giá từ cao đến thấp</option>
                                            @endif
                                            @if ( $sort == 2)
                                            <option value="2" selected>Giá từ thấp đến cao</option>
                                            @else
                                            <option value="2">Giá từ thấp đến cao</option>
                                            @endif
                                            
                                        </select>         
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <!-- Small button group -->
                    </div>
                </div>
                
                <!-- Popular Item Slide -->
                <div class="papular-block row single-img-demos"> 
                    
                    <!-- Item -->
                    <?php $countStep = 0 ?>
                    @foreach ( $products as $product)
                    @if( $countStep == 0)
                    <div>
                    @endif
                    <?php $countStep +=1 ?>
                    <div class="col-md-4 col-xs-6">
                        <div class="item"> 
                            <!-- Item img -->
                            <?php
                                $images = explode("|", $product['image']);
                            ?>
                            <div class="brem-image-index" >
                                <div class="item-img">
                                    <img class="img-1" style="width: 100%px;object-fit:cover" src="{{ Storage::disk('products')->url($images['0'])  }}" alt="" > 
                                    <!-- Overlay -->
                                    <div class="overlay">
                                        <div class="position-center-center">
                                            <form action="">
                                                @csrf
                                                <div>
                                                    {{-- id --}}
                                                    <input type="hidden" name="" 
                                                            value="{{$product['id']}}" class="cart_product_id_{{$product['id']}}">
                                                            {{-- name --}}
                                                    <input type="hidden" name="" 
                                                        value="{{$product['name']}}" class="cart_product_name_{{$product['id']}}">
                                                    {{-- image --}}
                                                    <input type="hidden" name="" 
                                                        value="{{$images['0']}}" class="cart_product_image_{{$product['id']}}">
                                                    {{-- price --}}
                                                    <input type="hidden" name="" 
                                                        value="{{$product['price']}}" class="cart_product_price_{{$product['id']}}">
                                                    {{-- quantity --}}
                                                    <input type="hidden" name="" 
                                                        value="1" class="cart_product_quantity_{{$product['id']}}">
                                                </div>
                                                <button class="inn custom-btn-add-cart add-to-cart" data-id="{{ $product['id'] }}">
                                                    <i class="icon-basket"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Item Name -->
                            <div class="item-name">
                                <a href="{{ route('frontend.product.show', $product['id']) }}">{{ $product['name'] }}</a>
                                <p>{{ $product['desc'] }}</p>
                            </div>
                            <!-- Price --> 
                            <span class="price"><small>đ</small>{{ number_format($product['price']) }}</span> 
                        </div>
                    </div>
                    @if( $countStep ==  3)
                    </div>
                    @endif
                    <?php 
                        if( $countStep == 3)
                        {
                            $countStep = 0;
                        }
                    ?>
                    @endforeach
                </div>
            </div>
            <!-- Pagination -->
            <div>
                {{ $products->links('frontend.layouts._pagination') }}
            </div>

        </div>
    </section>
</div>

        
@endsection
@section('insert-script')

@endsection