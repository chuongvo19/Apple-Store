@extends('backend.layouts.app')
@section('title')
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">
            Tài Khoản Khách Hàng
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <form action="{{ route('account.search.client') }}" method="GET">
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
                    <th>Tên</th>
                    {{-- <th>Avatar</th> --}}
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $accounts as $account)
            <tr>
                <td>{{ $account['id'] }}</td>
                <td><span class="text-ellipsis">{{ $account['last_name'].' '.$account['first_name'] }}</span></td>
                {{-- <td><img class="custom-show-avatar" src="{{ Storage::disk('avatars')->url($account['avatar']) }}" alt="avatar"></td> --}}
                <td><span class="text-ellipsis">{{ $account['email'] }}</span></td>
                <td><span class="text-ellipsis">{{ $account['telephone'] }}</span></td>
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
                <div class="col-sm-7 text-right text-center-xs">{{ $accounts->onEachSide(3)->links() }}</div>
            </div>
        </footer>
        </div>
    </div>
@endsection