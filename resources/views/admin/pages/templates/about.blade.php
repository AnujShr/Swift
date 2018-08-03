@extends('layouts.admin.master')
@section('page-content')
    <section class="content-header">
        <h1>
            About
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.pages')}}"><i class="fa fa-file"></i>Pages</a></li>
            <li class="active">About</li>
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
                        <div class="box-body table-responsive no-padding tables">

                            <div class="form-group ">
                                {!!Form::label('title', 'Title', ['class' => "control-label"])!!}
                                {!!Form::input('text', 'title', $page->title?:'',
                                    ['class' => "form-control ",  'required' => 'required'])!!}
                            </div>
                            <div class="form-group">
                                {!!Form::label('header_content_top', 'Header Content Top', ['class' => "control-label"])!!}
                                {!!Form::textarea('header_content_top', /*$trans ? @$trans['content']['top_content'] : */'',
                                    ['class' => 'form-control summernote', 'required' => 'required'])!!}
                            </div>
                            <div class="form-group">
                                {!!Form::label('header_content_bottom', 'Header Content Bottom', ['class' => "control-label"])!!}
                                {!!Form::textarea('header_content_bottom', /*$trans ? @$trans['content']['top_content'] : */'',
                                    ['class' => 'form-control summernote', 'required' => 'required'])!!}
                            </div>

                            <div class="form-group ">
                                {!!Form::label('location', 'Location', ['class' => "control-label"])!!}
                                {!!Form::input('text', 'location', $page->title?:'',
                                    ['class' => "form-control ",  'required' => 'required'])!!}
                            </div>

                            <div class="form-group ">
                                {!!Form::label('contact_no', 'Contact Number', ['class' => "control-label"])!!}
                                {!!Form::input('text', 'contact_no', $page->title?:'',
                                    ['class' => "form-control ",  'required' => 'required'])!!}
                            </div>

                            <div class="form-group">
                                {!!Form::label('email', "Enquiry Email", ['class' => "control-label"])!!}
                                {!!Form::input('email','email', /*$trans ? @$trans['content']['enquiry_email'] : */'',
                                    ['class' => 'form-control', 'required' => 'required'])!!}
                            </div>
                            <div class="form-controls">
                                {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                @include('admin.pages.templates.meta')
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
