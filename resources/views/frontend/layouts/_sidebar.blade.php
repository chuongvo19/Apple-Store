<!-- Shop SideBar -->
<div class="col-sm-3">
    <div class="shop-sidebar"> 
    
    <!-- Category -->
    <h5 class="shop-tittle margin-bottom-30">Danh Mục</h5>
    <ul class="shop-cate">
        @foreach ( $categories as $category )
        <li><a href="{{ route('frontend.category.index', $category['id']) }}"> {{ $category['name_category'] }} <span></span></a></li>
        @endforeach
    </ul>
    </div>
</div>