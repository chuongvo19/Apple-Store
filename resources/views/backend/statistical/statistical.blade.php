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
            THỐNG KÊ DOANH SỐ
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <input type="date" name="start-day" id="start-day" class="input-sm form-control" >
            </div>
            <div class="col-sm-4">
                <input type="date" name="end-day" id="end-day" class="input-sm form-control" >
            </div>
            <div class="col-sm-3">
                <form action="">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" id="fillter-day" type="button">Lọc</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive table-statistical">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Số Đơn Hàng</th>
                        <th>Doanh Thu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $countOrder }}</td>
                        <td>{{ number_format($totalPrice). '  VND' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">
            
            <div class="col-sm-5 text-center">
                <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
            </div>
            {{-- <div class="col-sm-7 text-right text-center-xs">{{ $categories->onEachSide(3)->links() }}</div> --}}
            </div>
        </footer>
        </div>
    </div>
@endsection
@section('js-form')
<script>
    $(document).on('click', '#fillter-day', function(e){
    let startDay = $('#start-day').val();
    let endDay = $('#end-day').val();
    let _token = $('input[name = "_token"]').val();
    event.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url: "/admin/statistical/fillter",
        data: {
            startDay:startDay,
            endday:endDay,
            _token:_token,
        },
        success: function(response){
            // alertify.success('Thay Đổi Thành Công');
            $('.table-statistical').html(response);
        },
        error: function(error){
            console.log(error);
        }
    })
    })
</script>

@endsection