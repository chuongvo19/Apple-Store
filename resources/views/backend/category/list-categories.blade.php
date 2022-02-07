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
            Danh Mục Sản Phẩm
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3">
                <form action="{{ route('categories.search') }}" method="GET">
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
                    <th>Mô Tả</th>
                    <th style="width:30px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $categories as $category)
            <tr>
                <td>{{ $category['id'] }}</td>
                <td><span class="text-ellipsis">{{ $category['name_category'] }}</span></td>
                <td><span class="text-ellipsis">{{ $category['desc'] }}</span></td>
                <td>
                    <a href="{{ route('categories.delete', $category['id']) }}" onclick="return confirm('Delete Category {{ $category['name_category'] }}')">
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
            <div class="col-sm-7 text-right text-center-xs">{{ $categories->onEachSide(3)->links() }}</div>
            </div>
        </footer>
        </div>
    </div>
@endsection