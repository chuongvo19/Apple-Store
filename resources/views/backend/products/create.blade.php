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
            <section class="panel">
                <header class="panel-heading">
                    THÊM DANH SẢN PHẨM
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form class="cmxform form-horizontal" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" role="form">
                            @csrf
                            {{-- name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Tên Sản Phẩm</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên Sản Phẩm" required>
                                    @error('name')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- desc --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Mô Tả</label>
                                <div class="col-lg-9">
                                <textarea style="resize: none" rows="8" class="form-control" name="desc" id="exampleInputPassword1" placeholder="Mô Tả" required></textarea>
                                @error('desc')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            {{-- price --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Giá Sản Phẩm</label>
                                <div class="col-lg-9">
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" placeholder="Giá Sản Phẩm" required>
                                    @error('price')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- color --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Màu Sản Phẩm</label>
                                <div class="col-lg-9">
                                    <input type="text" name="color" class="form-control" id="exampleInputEmail1" placeholder="Màu Sản Phẩm" required>
                                    @error('name')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Quantity --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Số Lượng</label>
                                <div class="col-lg-9">
                                    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Số Lượng Sản Phẩm" required>
                                    @error('quantity')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- image --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Ảnh Sản Phẩm</label>
                                <div class="col-lg-9">
                                <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" placeholder="Image Product" multiple required>
                                @error('product-image')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            {{-- category --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="control-label col-lg-3">Danh Mục</label>
                                <div class="col-lg-9">
                                    <select name="category_id" class="form-control m-bot15">
                                        @foreach ( $categories as $category)
                                        <option value="{{ $category['id'] }}" selected>{{ $category['name_category'] }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="control-label col-lg-3">Trạng Thái</label>
                                <div class="col-lg-9">
                                    <select name="status" class="form-control m-bot15">
                                        <option value="0" selected>New-Full box</option>
                                        <option value="1" >Old-99%</option>
                                        <option value="2" >Old</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-9">
                                    <button type="submit" class="btn btn-info" class="control-label col-lg-3">Thêm</button>
                                    <a href="{{ route('admin.dashboard') }}" type="submit" class="btn btn-danger">Trở Lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection