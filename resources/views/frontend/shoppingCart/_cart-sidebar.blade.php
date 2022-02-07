<li class="dropdown user-basket change-item-cart">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
        {{-- <div class="cart-drawer"> --}}
            <i class="icon-basket-loaded"></i>
            @if (Session::has('cart'))
            <div class="cart-number-bage">{{ count(session('cart')) }}</div>
            @endif
        {{-- </div> --}}
    </a>
    <ul class="dropdown-menu">
        @if (!isset($subTotal))
        @php
            $defaultSubTotal = 0;
        @endphp
        @endif
        @if (Session::has('cart'))
        @foreach ( Session::get('cart') as $keyProduct => $valueProduct)    
        <li id="product-cart-sidebar-{{ $valueProduct['session_id'] }}">
            <div>
                <div class="media-left">
                    <div class="cart-img">
                        <a href="#">
                            <img class="media-object img-responsive" style="width: 100%" src="{{ Storage::disk('products')->url($valueProduct['product_image']) }}" alt="...">
                        </a>
                    </div>
                </div>
                <div class="media-body">
                    <h6 class="media-heading">{{ $valueProduct['product_name'] }}</h6>
                    <span class="price">
                        {{ number_format($valueProduct['product_price']) }} đ       
                        <i style="margin-left: 20px;" class="far fa-trash-alt delete-icon delete-cart-sidebar" data-id-session="{{ $valueProduct['session_id'] }}"></i>
                    </span>
                    <span class="qty"  id="product-quantity-id-{{ $valueProduct['session_id'] }}">QTY: {{ $valueProduct['product_quantity'] }}</span>
                </div>
            </div>
        </li>
        @if ( isset($defaultSubTotal))
        @php
            $defaultSubTotal += ($valueProduct['product_price']*$valueProduct['product_quantity']);
        @endphp
        @endif
        @endforeach
        @endif
        <li >
        @if (isset($subTotal))
            <h5 class="text-center" id="subtotal-cart">SUBTOTAL: {{ number_format($subTotal) }} đ</h5>
        @else
            <h5 class="text-center" id="subtotal-cart">SUBTOTAL: {{ number_format($defaultSubTotal) }} đ</h5>
        @endif
        </li>
        <li class="margin-0">
            <div class="row">
                <div class="col-xs-6"> <a href="{{ route('frontend.cart.list-cart') }}" class="btn">Giỏ Hàng</a></div>
                <div class="col-xs-6 "> <a href="{{ route('frontend.cart.check-out') }}" class="btn">Thanh Toán</a></div>
            </div>
        </li>
    </ul>
</li>