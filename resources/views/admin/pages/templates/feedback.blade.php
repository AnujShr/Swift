@extends('layouts.admin.master')
@section('page-content')
    <section class="content-header">
        <h1>
            Feedback
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li> <a href="{{route('admin.pages')}}"><i class="fa fa-file"></i>Pages</a></li>
            <li class="active">Feedback</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="content">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Feedback</h5>
                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection