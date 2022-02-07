@extends('frontend.layouts.app')
@section('content')
<div id="content"> 
    <section class="chart-page padding-top-100 padding-bottom-100">
        <div class="container"> 
            <div class="row">
                <div class="col-md-7">
                    <div class="col-md-12">
                        <h6>ĐƠN HÀNG CỦA BẠN</h6>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Ngày Đặt</th>
                                    <th>Trạng Thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $order as $value)
                                <tr>
                                    <td>{{ $value['id'] }}</td>
                                    <td>{{ number_format($value['total_price']) }} VNĐ</td>
                                    <td>{{ $value['created_at'] }}</td>
                                    @if( $value['status'] == 0)
                                    <td>Chưa Giao</td>
                                    @elseif($value['status'] == 1)
                                    <td>Đang Vận Chuyển</td>
                                    @elseif($value['status'] == 2 || $value['status'] == 3)
                                    <td>Đã Giao</td>
                                    @elseif($value['status'] == 4)
                                    <td>Hoàn Thành</td>
                                    @endif
                                    <td>
                                        <a href="Javascript::" class="info-order-class" data-id-order="{{ $value['id'] }}" id="info-order-item-id-{{ $value['id'] }}">Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="col-md-12" id="info-order-id">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>  
@endsection
@section('insert-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.sub-bnr').css("display","none")
        }) 
    </script>

    <script>
        $(document).on('click', '.info-order-class', function(e) {
        let orderId = $(this).data('id-order');
        $.ajax({
            url: '/user/show-order-item/'+orderId,
            type:'GET',
            success: function(response)
            {
                $('#info-order-id').html(response);
            },  
            error: function(error)
            {
            console.log(error);
            }
        })
    })
    </script>
@endsection
