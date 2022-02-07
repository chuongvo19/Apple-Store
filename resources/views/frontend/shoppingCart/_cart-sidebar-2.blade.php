<li class="dropdown user-basket change-item-cart"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="icon-basket-loaded"></i> </a>
    <ul class="dropdown-menu">
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
                        <a href=".." class="delete-cart-sidebar" data-id-session="{{ $valueProduct['session_id'] }}">
                            <i style="margin-left: 20px;" class="far fa-trash-alt delete-icon " data-id-session="{{ $valueProduct['session_id'] }}"></i>
                        </a>
                    </span>
                    <span class="qty">QTY: 01</span>
                </div>
            </div>
        </li>
        @endforeach
        @endif
        <li>
            <h5 class="text-center">SUBTOTAL: {{ number_format($subTotal) }} đ</h5>
        </li>
        <li class="margin-0">
            <div class="row">
                <div class="col-xs-6"> <a href="shopping-cart.html" class="btn">VIEW CART</a></div>
                <div class="col-xs-6 "> <a href="checkout.html" class="btn">CHECK OUT</a></div>
            </div>
        </li>
    </ul>
</li>