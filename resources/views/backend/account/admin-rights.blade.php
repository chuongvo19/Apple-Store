@extends('backend.layouts.app')
@section('title')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="table-agile-info col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Admin
                        </div>
                        <div class="row w3-res-tb">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên</th>
                                    <th style="width:30px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="role-is-admin">
                            @foreach ( $admins as $admin)
                            <tr class="item-id-{{ $admin['id'] }}">
                                <td>{{ $admin['id'] }}</td>
                                <td><span class="text-ellipsis">{{ $admin['last_name'].' '.$admin['first_name'] }}</span></td>
                                <td>
                                    @if($admin['id'] != 1)
                                    <button class="btn btn-warning btn-change-role" data-id="{{ $admin['id'] }}">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- employee --}}
            <div class="col-md-6">
                <div class="table-agile-info col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nhân viên
                        </div>
                        <div class="row w3-res-tb">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên</th>
                                    <th style="width:30px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="role-is-employee">
                            @foreach ( $employees as $employee)
                            <tr class="item-id-{{ $employee['id'] }}">
                                <td>{{ $employee['id'] }}</td>
                                <td><span class="text-ellipsis">{{ $employee['last_name'].' '.$employee['first_name'] }}</span></td>
                                <td>
                                    <button class="btn btn-warning btn-change-role" data-id="{{ $employee['id'] }}">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-form')
    <script>
        // $(document).ready(function(){
            $(document).on('click', '.btn-change-role', function(){
            let id = $(this).data('id');
            $('.item-id-'+id).hide();
            $.ajax({
                url: '/admin/admin/change-role/'+id ,
                method: 'GET',
                success: function(response){
                    if(response['role'] == 1)
                    {
                        $('.role-is-admin').append(
                            `<tr class="item-id-`+response['id']+`">`+
                            `<td>`+response['id']+`</td>`+
                            `<td><span class="text-ellipsis">`+response['name']+`</span></td>`+
                            `<td>`+
                            `<button class="btn btn-warning btn-change-role" data-id="`+response['id']+`">`+
                            `<i class="fa fa-arrow-right"></i>`+
                            `</button>`+
                            `</td>`+
                            `</tr>`
                        );
                    }
                    else if(response['role'] == 2)
                    {
                        $('.role-is-employee').append(
                            `<tr class="item-id-`+response['id']+`">`+
                            `<td>`+response['id']+`</td>`+
                            `<td><span class="text-ellipsis">`+response['name']+`</span></td>`+
                            `<td>`+
                            `<button class="btn btn-warning btn-change-role" data-id="`+response['id']+`">`+
                            `<i class="fa fa-arrow-left"></i>`+
                            `</button>`+
                            `</td>`+
                            `</tr>`
                        );
                    }
                },
                error: function(error){
                    console.log(error);
                }
            })
            })
        // })
    </script>
@endsection