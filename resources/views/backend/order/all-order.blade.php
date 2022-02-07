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
            DANH SÁCH ĐƠN HÀNG
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <form action="{{ route('categories.search') }}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="search" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit">Search</button>
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
                    <th>Tên Người Đặt</th>
                    <th>Tổng Tiền</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng thái</th>
                    <th style="width:30px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $orders as $order)
            <tr id="order-id-{{ $order['id'] }}">
                <td>{{ $order['id'] }}</td>
                <td><span class="text-ellipsis">{{ $order['last_name'].' '.$order['first_name'] }}</span></td>
                <td><span class="text-ellipsis">{{ number_format($order['total_price']).' VND' }}</span></td>
                <td><span class="text-ellipsis">{{ $order['created_at'] }}</span></td>

                <td>
                    <form id="form-select-status-order">
                        @csrf
                        <div class="input-group">
                            <select class="input-sm form-control select-status-order-class" data-id-order="{{ $order['id'] }}"
                                    id="" name="status-order">
                                {{-- option --}}
                                @if ($order['status'] == 0)
                                <option value="0" selected>Chưa Giao</option>
                                @else
                                <option value="0">Chưa Giao</option>
                                @endif
                                @if ($order['status'] == 1)
                                <option value="1" selected>Đang Vận Chuyển</option>
                                @else
                                <option value="1">Đang Vận Chuyển</option>
                                @endif
                                @if ($order['status'] == 2)
                                <option value="2" selected>Đã giao, Chưa Đối Soát</option>
                                @else
                                <option value="2">Đã giao, Chưa Đối Soát</option>
                                @endif
                                @if ($order['status'] == 3)
                                <option value="3" selected>Đã giao, Đã Đối Soát</option>
                                @else
                                <option value="3">Đã giao, Đã Đối Soát</option>
                                @endif
                            </select>
                        </div>
                    </form>
                </td>

                <td>
                    <a href="{{ route('admin.manager.order.item', $order['id']) }}">
                        <i class="fa fa-folder text-primary text"></i>                        
                    </a>
                    <i class="fa fa-times text-danger text delete-order" data-id-order="{{ $order['id'] }}"></i>
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
            {{-- <div class="col-sm-7 text-right text-center-xs">{{ $categories->onEachSide(3)->links() }}</div> --}}
            </div>
        </footer>
        </div>
    </div>
@endsection
@section('js-form')
<script>
    $('.select-status-order-class').on('change', function(event){
    let orderId = $(this).data('id-order');
    let status = $(this).val();
    let _token = $('input[name = "_token"]').val();
    event.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: "/admin/order-change",
        data: {
            orderId:orderId,
            status:status,
            _token:_token,
        },
        success: function(response){
            alertify.success('Thay Đổi Thành Công');
        },
        error: function(error){
            console.log(error);
        }
    })
    })
</script>
<script>
    $(document).on('click', '.delete-order', function(e){
        var result = confirm("Bạn muốn xóa?");
        if (result) {
            //Logic to delete the item
            let orderId = $(this).data('id-order');
            // alert(orderId);
            $.ajax({
                url: '/admin/order-delete/'+orderId,
                type:'GET',
                success: function(response)
                {
                $('#order-id-'+orderId).hide();
                
                alertify.success('Xóa đơn hàng thành công');
                },
                error: function(error)
                {
                console.log(error);
                }
            })
        }
    })
</script>
@endsection