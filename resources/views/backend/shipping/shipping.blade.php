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
            Quản Lý Phí Vận Chuyển
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <form id="form-select-city">
                    @csrf
                    <div class="input-group">
                        <select class="input-sm form-control" id="select-city-id" name="city-id"
                                onchange="$('#form-select-city').submit();">
                            {{-- option --}}
                            <option value="0" selected>----  Chọn tỉnh thành  ----</option>
                            @foreach ( $citys as $city)
                            <option value="{{ $city['id'] }}">----  {{ $city['name'] }}  ----</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <form action="" method="GET" id="form-update-fee-ship">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" id="update-fee-city-id" name="city-id">
                        <input type="number" name="price-fee" class="input-sm form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit">Cập Nhật</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light" id="table-fee-ship">
                <thead>
                    <tr>
                        <th>Tỉnh</th>
                        <th>Phí Vận Chuyển</th>
                        <th style="width:30px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $datas as $data)
                <tr>
                    <td><span class="text-ellipsis">{{ $data['name'] }}</span></td>
                    <td>
                        <span class="text-ellipsis" id="fee-ship-city-id-{{ $data['id'] }}">
                            {{ number_format($data['fee']) }} VND
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('categories.delete', $data['id']) }}" onclick="return confirm('Delete {{ $data['name'] }}')">
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
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs" id="pagination">{{ $datas->onEachSide(3)->links() }}</div>
            </div>
        </footer>
    </div>
</div>
@endsection
@section('js-form')
<script>
    $("#form-select-city").submit(function(event){
        let cityId = $('#select-city-id').val();
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "/admin/manager/shipping/city",
            data: $(this).serializeArray(),
            success: function(response){
                $("#table-fee-ship").replaceWith(response);
                if( cityId != 0)
                {
                    $('#pagination').css("display","none");
                    $('#form-update-fee-ship').css("display","inline");
                    $('#update-fee-city-id').val(cityId);
                }else
                    {
                    $('#pagination').css("display","inline");
                    $('#form-update-fee-ship').css("display","none");
                    }
            },
            error: function(error){
                console.log(error);
            }
        })
    })
</script>
{{-- update --}}
<script>
    $("#form-update-fee-ship").submit(function(event){
        let cityId = $('#select-city-id').val();
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: "/admin/manager/shipping/update/fee",
            data: $(this).serializeArray(),
            success: function(response){
                $("#fee-ship-city-id-"+cityId).html(response+' VND');
            },
            error: function(error){
                console.log(error);
            }
        })
    })
</script>
@endsection
