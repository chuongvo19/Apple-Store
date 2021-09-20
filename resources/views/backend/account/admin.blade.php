@extends('backend.layouts.app')
@section('title')
    <div class="table-agile-info">
        <div class="panel panel-default">
        <div class="panel-heading">
            Tài Khoản Admin
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
                <option value="0">Bulk action</option>
                <option value="1">Delete selected</option>
                <option value="2">Bulk edit</option>
                <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>                
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
                </span>
            </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                <th style="width:20px;">
                    <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                    </label>
                </th>
                <th>Id</th>
                <th>Tên</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th style="width:30px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ( $admins as $admin)
            <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $admin['id'] }}</td>
                <td><span class="text-ellipsis">{{ $admin['last_name'].' '.$admin['first_name'] }}</span></td>
                <td><img class="custom-show-avatar" src="{{ Storage::disk('avatars')->url($admin['avatar']) }}" alt="avatar"></td>
                <td><span class="text-ellipsis">{{ $admin['email'] }}</span></td>
                <td><span class="text-ellipsis">{{ $admin['telephone'] }}</span></td>
                <td>
                    <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
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
            <div class="col-sm-7 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
            </div>
        </footer>
        </div>
    </div>
@endsection