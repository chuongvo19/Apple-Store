<table class="table table-striped b-t b-light">
    <thead>
        <tr>
            <th>Số Đơn Hàng</th>
            <th>Doanh Thu</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $result['count-order'] }}</td>
            <td>{{ number_format($result['total']). '  VND' }}</td>
        </tr>
    </tbody>
</table>