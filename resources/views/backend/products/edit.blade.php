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
               
            </section>
        </div>
    </div>
    {{-- digital --}}
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập Nhật Sản Phẩm
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;" style="text-decoration: none"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal " id="form-edit-product-1" method="POST" action="{{ route('products.update', $product['id']) }}" enctype="multipart/form-data" novalidate="novalidate">
                            @method('PUT')
                            @csrf
                            {{-- name --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Tên Sản Phẩm</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="exampleInputEmail1" placeholder="Tên Sản Phẩm" required>
                                    @error('name')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- desc --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Mô Tả</label>
                                <div class="col-lg-9">
                                <input type="text" name="desc" value="{{ $product->desc }}" class="form-control" id="exampleInputEmail1" placeholder="Mô Tả Sản Phẩm" required>
                                {{-- <textarea style="resize: none" rows="8" class="form-control" name="desc" id="exampleInputPassword1" placeholder="Mô Tả" required></textarea> --}}
                                @error('desc')
                                    <div class='alert alert-danger'>{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            {{-- price --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Giá Sản Phẩm</label>
                                <div class="col-lg-9">
                                    <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="exampleInputEmail1" placeholder="Giá Sản Phẩm" required>
                                    @error('price')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- color --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Màu Sản Phẩm</label>
                                <div class="col-lg-9">
                                    <input type="text" name="color" value="{{ $product->color }}" class="form-control" id="exampleInputEmail1" placeholder="Màu Sản Phẩm" required>
                                    @error('name')
                                        <div class='alert alert-danger'>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- Quantity --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="control-label col-lg-3">Số Lượng</label>
                                <div class="col-lg-9">
                                    <input type="hidden" name="inventory_id" value="{{ $product->inventory_id }}">
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control" id="exampleInputEmail1" placeholder="Số Lượng Sản Phẩm" required>
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
                                <?php
                                    $images = explode('|', $product['image']);
                                ?>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    @foreach ( $images as $image )
                                    <img class="custom-show-product" src="{{ Storage::disk('products')->url($image) }}" alt="product">
                                    <input type="hidden" name="image[]" value="{{ $image }}">
                                    @endforeach
                                </div>
                            </div>
                            {{-- category --}}
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="control-label col-lg-3">Danh Mục</label>
                                <div class="col-lg-9">
                                    <select name="category_id" class="form-control m-bot15">
                                        @foreach ( $categories as $category)
                                            @if ($category['id'] == $product['category_id'])
                                            <option value="{{ $category['id'] }}" selected>{{ $category['name_category'] }}</option>
                                            @else
                                            <option value="{{ $category['id'] }}" >{{ $category['name_category'] }}</option>
                                            @endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="control-label col-lg-3">Trạng Thái</label>
                                <div class="col-lg-9">
                                    <select name="status" class="form-control m-bot15">
                                        @if ($product['status'] == 0)
                                        <option value="0" selected>New-Full box</option>
                                        @else
                                        <option value="0" >New-Full box</option>
                                        @endif
                                        @if ($product['status'] == 1)
                                        <option value="1" selected>Old-99%</option>
                                        @else
                                        <option value="1" >Old-99%</option>
                                        @endif
                                        @if ($product['status'] == 2)
                                        <option value="2" selected>Old</option>
                                        @else
                                        <option value="2" >Old</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- digital --}}
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cấu Hình Sản phẩm
                </header>
                <div class="panel-body">
                    <div class=" form">
                            <div class="col-lg-12 custom-form-edit">
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Kích Thước Màn Hình</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="screen_size" value="{{ $digital['screen_size'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Vi Xử Lý</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="chipset" value="{{ $digital['chipset'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-lg-12 custom-form-edit">
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Độ Phân giải màn Hình</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="screen_resolution" value="{{ $digital['screen_resolution'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Kích Thước Sản Phẩm</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="size" value="{{ $digital['size'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                            
                            <div class="col-lg-12 custom-form-edit">
                                <div class="col-lg-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Ram</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="ram" value="{{ $digital['ram'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Rom</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="rom" value="{{ $digital['rom'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Chống nước</label>
                                            <div class="col-lg-6">
                                                <select name="status" class="form-control m-bot15">
                                                    @if ($product['waterproof'] == 1)
                                                    <option value="0" selected>Yes</option>
                                                    @else
                                                    <option value="0" >Yes</option>
                                                    @endif
                                                    @if ($product['waterproof'] == 0)
                                                    <option value="1" selected>No</option>
                                                    @else
                                                    <option value="1" >No</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Pin</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="battery" value="{{ $digital['battery'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Camera Trước</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" ame="front_camera" value="{{ $digital['front_camera'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-6">Camera Sau</label>
                                            <div class="col-lg-6">
                                                <input class=" form-control" id="cname" name="rear_camera"  value="{{ $digital['rear_camera'] }}" minlength="2" type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label for="ccomment" class="control-label">Thông Tin</label>
                                            <div class="">
                                                <textarea class="form-control " id="ckeditor" name="infomation" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    {{-- <div class="col-lg-1"></div> --}}
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="">
                                                <input type="submit" value="Save" class="btn btn-primary" onclick="submitForms()">
                                                <button class="btn btn-default" type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js-form-edit')
    <script type="text/javascript">
        submitForms = function(){
            document.getElementsById("form-edit-product-1").submit();
            document.getElementsById("form-edit-product-2").submit();
        }

        CKEDITOR.replace('ckeditor');
    </script>
@endsection