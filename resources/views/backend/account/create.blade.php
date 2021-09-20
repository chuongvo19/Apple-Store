@extends('backend.layouts.app')
@section('title')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        @if (Session::has('notification'))
            <div class='alert alert-danger'>
                {{ Session::get('notification') }}
            </div>
        @endif
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    TẠO TÀI KHOẢN ADMIN
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form method="post" action="{{ route('account.store') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            {{-- user name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Người Dùng</label>
                                <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Người Dùng" required>
                            </div>
                            {{-- first name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Tên">
                            </div>
                            {{-- last name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ</label>
                                <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Họ">
                            </div>
                            {{-- email --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                            </div>
                            {{-- password --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            {{-- Number phone --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Điện Thoại</label>
                                <input type="number" name="number_phone" class="form-control" id="exampleInputEmail1" placeholder="Số Điện Thoại" required>
                            </div>
                            {{-- avatar admin --}}
                            <div class="form-group">
                                <label for="exampleInputFile">Hình Đại Diện</label>
                                <input type="file" name="avatar" id="exampleInputFile" required>
                            </div><br>
                            <button type="submit" class="btn btn-info">Tạo</button>
                            <a href="{{ route('admin.dashboard') }}" type="submit" class="btn btn-danger">Dừng Lại</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection