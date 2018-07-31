@extends('admin.master')
@section('page-content')
    <section class="content-header">
        <h1>
            Users
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">

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

                                    <div class="box-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control pull-right"
                                                   placeholder="Search">

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-default"><i
                                                            class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                        </tr>
                                        @foreach($users as $user)
                                            <tr>

                                                <td>{{$loop->index +1 }}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->created_at->format('Y-M-D')}}</td>
                                                <td>@if($user->confirmed == 1)
                                                        <span class="label label-success">Active</span></td>
                                                @else
                                                    <span class="label label-warning">Pending</span></td>
                                                @endif
                                                <td>{{$user->email}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection