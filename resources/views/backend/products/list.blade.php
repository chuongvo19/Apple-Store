@extends('backend.layouts.app')
@section('title')
@if (Session::has('notification'))
<div class='alert alert-success'>
    {{ Session::get('notification') }}
</div>
@endif
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sản Phẩm
        </div>
        <div class="row w3-res-tb">
            <form action="{{ route('products.search') }}" method="GET">
                @csrf
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle" name="sort">
                        <option value="0">Sắp Xếp Theo</option>
                        <option value="1">Giá từ cao đến thấp</option>
                        <option value="2">Giá từ thấp đến cao</option>
                    </select>         
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                        </span>
                        
                </div>
            </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Màu</th>
                    <th>Số Lượng</th>
                    <th>Trạng thái</th>
                    <th>Danh mục</th>
                    <th style="width:30px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td><span class="text-ellipsis">{{ $product['name'] }}</span></td>
                <td>
                    <?php
                        $images = explode("|", $product['image']);
                    ?>
                    @foreach ($images as $image)
                        <img class="custom-show-product" src="{{ Storage::disk('products')->url($image) }}" alt="product">
                    @endforeach
                </td>
                <td><span class="text-ellipsis">{{ number_format($product['price']).' VND' }}</span></td>
                <td><span class="text-ellipsis">{{ $product['color'] }}</span></td>
                <td><span class="text-ellipsis">{{ ($product['quantity']) }}</span></td>
                <td>
                    @if ( $product['status'] == 0)
                    <span>New-Full box</span>
                    @elseif ( $product['status'] == 1)
                    <span>Old-99%</span>
                    @else
                    <span>Old</span>
                    @endif
                </td>
                <td><span class="text-ellipsis">{{ $product['name_category'] }}</span></td>
                <td>
                    <a href="{{ route('products.show', $product['id']) }}">
                        <i class="fa fa-folder text-primary text"></i>                        
                    </a>
                    <a href="{{ route('products.delete', $product['id']) }}" onclick="return confirm('Delete Product {{ $product['name'] }}')">
                        <i class="fa fa-times text-danger text"></i>                        
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
            
            <div class="col-sm-5 text-center">
                
            </div>
            <div class="col-sm-7 text-right text-center-xs">                
                <div class="col-sm-7 text-right text-center-xs">{{ $products->onEachSide(3)->links() }}</div>
            </div>
            </div>
        </footer>
        </div>
    </div>
@endsection