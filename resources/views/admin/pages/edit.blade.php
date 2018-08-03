@extends('layouts.admin.master')
@section('page-content')
    <section class="content-header">
        <h1>
           {{$page->title}}
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.pages')}}"><i class="fa fa-file"></i>Pages</a></li>
            <li class="active">{{$page->title}}</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="content">
                {!!Form::open([
                            'url'        => route('admin.page.update', [$page->slug]),
                            'method'     => 'put',
                            'files'      => true,
                            'novalidate' => 'novalidate'
                             ])
                           !!}
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Pages</h5>
                    </div>
                    <div class="panel-body">
                        @include('admin.pages.templates.'.$page->slug)
                    </div>
                </div>
                @include('admin.pages.templates.meta')
                <div class="form-controls">
                    {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </section>
@endsection
