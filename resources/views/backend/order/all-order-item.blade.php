@extends('backend.layouts.app')
@section('title')
@if (Session::has('notification'))
<div class='alert alert-success'>
    {{ Session::get('notification') }}
</div>
@endif
<div class="table-agile-info">
    <div class="panel panel-default">
        <a href="{{ route('admin.manager.order') }}" type="submit" class="btn btn-danger" style="margin:5px">Trở lại</a>
        <div class="panel-heading">
            CHI TIẾT ĐƠN HÀNG
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                {{-- <form action="{{ route('categories.search') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit">Search</button>
                        </span>
                    </div>
                </form> --}}
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá/1 đơn vị</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $orderItem as $value)
                    <tr>
                        <td>{{ $value['product_name'] }}</td>
                        <td>{{ $value['product_quantity'] }}</td>
                        <td>{{ $value['product_price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Thông Tin Nhận Hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{ $shipping->customer_name.',   Số điện thoại:   '.$shipping->telephone.',   Địa chỉ:   '.$shipping->address.', '.$district.', '.$city.'.' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        <footer class="panel-footer">
            <div class="row">
            
            <div class="col-sm-5 text-center">
            </div>
            {{-- <div class="col-sm-7 text-right text-center-xs">{{ $categories->onEachSide(3)->links() }}</div> --}}
            </div>
        </footer>
        </div>
    </div>
@endsection
@section('js-form')

@endsection