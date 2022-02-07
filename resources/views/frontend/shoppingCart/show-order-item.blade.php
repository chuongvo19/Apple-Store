<table class="table table-bordered">
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
            <td>{{ number_format($value['product_price']).' '.'VNĐ' }}</td>
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