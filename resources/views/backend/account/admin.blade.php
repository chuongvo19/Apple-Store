@extends('backend.layouts.app')
@section('title')
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">
            Tài Khoản Admin
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs"> 
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="{{ route('account.search.admin') }}" method="GET">
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
                    <th>Ảnh </th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th style="width:30px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $admins as $admin)
            <tr>
                <td>{{ $admin['id'] }}</td>
                <td><span class="text-ellipsis">{{ $admin['last_name'].' '.$admin['first_name'] }}</span></td>
                <td><img class="custom-show-avatar" src="{{ Storage::disk('avatars')->url($admin['avatar']) }}" alt="avatar"></td>
                <td><span class="text-ellipsis">{{ $admin['email'] }}</span></td>
                <td><span class="text-ellipsis">{{ $admin['telephone'] }}</span></td>
                <td>
                    @if (Auth::user()->role == 1)
                        @if ($admin['id'] != 1)
                        <a href="{{ route('account.delete', $admin['id']) }}" onclick="return confirm('Delete Category {{ $admin['name'] }}')" class="active" ui-toggle-class="">
                            <i class="fa fa-times text-danger text"></i>
                        </a>
                        @endif
                    @endif
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
                <div class="col-sm-7 text-right text-center-xs">{{ $admins->onEachSide(3)->links() }}</div>
                {{-- <div class="col-sm-7 text-right text-center-xs">                
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div> --}}
            </div>
        </footer>
        </div>
    </div>
@endsection