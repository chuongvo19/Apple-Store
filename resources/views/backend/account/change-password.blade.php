@extends('backend.layouts.app')
@section('title')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        @if (Session::has('notification'))
            <div class='alert alert-success'>
                {{ Session::get('notification') }}
            </div>
        @endif
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    THAY ĐỔI MẬT KHẨU
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form method="post" action="{{ route('admin.change.password', Auth::user()->id) }}" enctype="multipart/form-data" role="form">
                            @method('PUT')
                            @csrf
                            {{-- password old --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu Cũ</label>
                                <input type="password" name="password_old" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            {{-- new password --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật Khẩu Mới</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                @error('password')
                                    <div class="custom-infomation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- password confirm --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập Lại Mật Khẩu Mới</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                @error('password_confirmation')
                                    <div class="custom-infomation-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">Cập Nhật</button>
                            <a href="{{ route('admin.dashboard') }}" type="submit" class="btn btn-danger">Trở Lại</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection