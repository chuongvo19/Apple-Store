@extends('backend.layouts.app')
@section('title')
<div class="form-w3layouts">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('notification'))
                <div class='alert alert-success'>
                    {{ Session::get('notification') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class='alert alert-danger'>
                    {{ Session::get('error') }}
                </div>
            @endif
            <section class="panel">
                <header class="panel-heading">
                    THÊM DANH MỤC SẢN PHẨM
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form method="post" action="{{ route('categories.store') }}"  role="form">
                            @csrf
                            {{-- user name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh Mục</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục" required>
                                @error('name')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- first name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô Tả</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="desc" id="exampleInputPassword1" placeholder="Mô Tả"></textarea>
                                @error('desc')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <button type="submit" class="btn btn-info">Thêm</button>
                            <a href="{{ route('admin.dashboard') }}" type="submit" class="btn btn-danger">Trở Lại</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection