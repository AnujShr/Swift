@extends('admin.master')
@section('page-content')
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
                                <div id="load" style="position: relative;">
                                    <div class="box-body table-responsive no-padding tables">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Email</th>
                                                <th>Last Login</th>
                                                <th>Status</th>
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
                                                            <span class="label label-success">Activated</span></td>
                                                    @else
                                                        <span class="label label-warning">Pending</span></td>
                                                    @endif


                                                </tr>
                                            @endforeach

                                        </table>
                                        <div class="center">{{$users->links()}}</div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <script>

        $(document).on('click', '.pagination a', function (event) {
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            event.preventDefault();
            let myurl = $(this).attr('href');
            let page = $(this).attr('href').split('page=')[1];
            getData(page);
            window.history.pushState("", "", myurl);
        });


        function getData(page) {
            $.ajax({
                url: '?page=' + page,
                type: "get",
                datatype: "html",
            })
                .done(function (data) {
                    $('.tables').html($(data).find('.tables').html());
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

    </script>
    </div>
@endsection