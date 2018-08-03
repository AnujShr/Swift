@extends('layouts.admin.master')
@section('page-content')

    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>   Pages
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><i class="fa fa-file"></i> Pages</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="content">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Pages</h5>
                </div>
                <div class="panel-body">
                    <div class="box-body table-responsive no-padding tables">
                        <table id="table-datatable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->slug}}</td>
                                    <td> <a href="{{route('admin.pages.view',[$page->slug])}}"><button type="button" class="btn btn-primary">Edit</button></a> </td>
                                </tr>
                            @endforeach
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
            </div>
        </div>

    </section>
    <script>

    </script>

@endsection