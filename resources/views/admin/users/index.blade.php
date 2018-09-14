@extends('layouts.admin.master')
@section('page-content')
    <style>

    </style>
    <section class="content-header">
        <h1>
            <i class="fa fa-users fa-4"></i> Users
            <small>User Listing</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">
        <div class="content">
            <div class="row">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title"></h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Users</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div id="load" style="position: relative;">
                                        <div class="box-body table-responsive no-padding tables">
                                            <table class="table table-bordered" id="table">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                                </thead>
                                            </table>
                                            {{--<table class="table table-hover">
                                                <tr>
                                                    <th data-id="id">ID</th>
                                                    <th data-id="user">User</th>
                                                    <th data-id="email">Email</th>
                                                    <th data-id="login">Last Login</th>
                                                    <th data-id="login">Status</th>
                                                    <th class="table-head">Action</th>
                                                </tr>
                                                @foreach($users as $user)
                                                    <tr>

                                                        <td>{{$loop->index +1 }}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>

                                                        <td>{!! (isset($user->last_login))?'<span class="label label-info">'.
                                                    \Carbon\Carbon::parse($user->last_login)->diffForHumans().'</span>'
                                                    :'<span class="label label-danger">NOT LOGIN</span>'!!}</td>
                                                        <td>@if($user->confirmed == 1)
                                                                <span class="label label-success">Activated</span>
                                                            @else
                                                                <span class="label label-warning">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <li class="dropdown">
                                                                <a class="list-text dropdown-toggle" href="#" data-toggle="dropdown"
                                                                   role="button" aria-expanded="false">
                                                                    <i class="fa fa-list-ul"></i> <span
                                                                            class="caret"></span></a>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li><a href="{{ route('admin.loginAsUser',[$user->id]) }}" data-toggle="tooltip" title="Login as User"><i class=" icon-enter"></i>Login As User</a></li>
                                                                    <li><a href="#">One more separated link</a></li>
                                                                </ul>
                                                            </li>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </table>--}}
                                            {{--<div class="center">{{$users->links()}}</div>--}}
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.users.view') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' }
                ]
            });
        });
    </script>
@endsection