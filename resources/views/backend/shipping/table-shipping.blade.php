@if (isset($datas))
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
        <td><span class="text-ellipsis">{{ number_format($data['fee']) }} VND</span></td>
        <td>
            <a href="{{ route('categories.delete', $data['id']) }}" onclick="return confirm('Delete {{ $data['name'] }}')">
                <i class="fa fa-times text-danger text"></i>                        
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@if (isset($dataCity))
<table class="table table-striped b-t b-light" id="table-fee-ship">
    <thead>
        <tr>
            <th>Tỉnh</th>
            <th>Phí Vận Chuyển</th>
            <th style="width:30px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><span class="text-ellipsis">{{ $dataCity['name'] }}</span></td>
            <td>
                <span class="text-ellipsis" id="fee-ship-city-id-{{ $dataCity->city_id }}">
                    {{ number_format($dataCity->fee) }} VND
                </span>
            </td>
            <td>
                <a href="{{ route('categories.delete', $dataCity->id) }}" onclick="return confirm('Delete {{ $dataCity->name }}')">
                    <i class="fa fa-times text-danger text"></i>                        
                </a>
            </td>
        </tr>
    </tbody>
</table>
@endif