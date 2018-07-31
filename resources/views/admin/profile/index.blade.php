@extends('admin.master')

@section('page-content')
    <section class="content-header">
        <h1>
            Profile
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Settings</h5>
                </div>
                <div class="panel-body">
                    {!! Form::model($user,['url'=>'','class'=>'form-horizontal', 'id'=>'admin-profile-form']) !!}
                    <div class="form-group">
                        {!! Form::label('name','Name',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('name',null,['class'=>'form-control','id'=>'name','placeholder' => 'Name']) !!}
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','Email',['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::text('email',null,['class'=>'form-control','id'=>'email','placeholder' => 'Email']) !!}
                            <span class="error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('skill','Skill',['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-10">
                            {!! Form::text('skill',null,['class'=>'form-control','id'=>'skill','placeholder' => 'Skill']) !!}
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Change Password',['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-3">
                            <button class="btn btn-default btn-block btn bg-blue margin" id="change-profile-pic">Change
                                Profile Picture
                            </button>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Change Password',['class'=>'col-sm-2 control-label']) !!}

                        <div class="col-sm-3">
                            <button class="btn btn-default btn-block btn bg-maroon margin" id="password-change">Change
                                Password
                            </button>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @include('admin.profile._partials.password_confirmation')
    @include('admin.profile._partials.change_password')
    @include('admin.profile._partials.profile_picture')
    <!-- /.row -->
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#profile_picture").change(function () {
                $('#profile-img-tag').show();
                readURL(this);
            });

            $('#password-change').click(function (e) {
                e.preventDefault();
                $('#change-password').modal();

            });
            $('#change-profile-pic').click(function (e) {
                e.preventDefault();
                $('#profile-picture').modal();

            });
            $('#admin-profile-form').submit(function (e) {
                e.preventDefault();
                $('div').removeClass('has-error');
                $('.error').html('');
                $('#password-confirmation').modal();

            });

            $('#confirm-password').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: '/admin/confirm-password',
                    data: $('#confirm-password').serialize(),
                    type: 'post',
                    dataType: 'json',
                    success: function () {
                        saveProfile();
                    },
                    error: function (errors) {
                        $.each($.parseJSON(errors.responseText), function (key, value) {
                            key = $('#' + key);
                            key.parent('div').addClass('has-error');
                            key.next('span').html(value);
                            key.next('span').addClass('help-block');
                        });
                    }

                });
            });
            let passwordChange = $('#passwordChange');
            passwordChange.submit(function (e) {
                e.preventDefault();
                removeErrors(passwordChange);
                $.ajax({
                    url: '/admin/change-password',
                    data: $(this).serialize(),
                    type: 'post',
                    dataType: 'json',
                    success: function () {
                        location.reload()
                    },
                    error: function (errors) {
                        $.each($.parseJSON(errors.responseText), function (key, value) {
                            key = $('#' + key);
                            key.parent('div').addClass('has-error');
                            key.next('span').html(value);
                            key.next('span').addClass('help-block');
                        });
                    }
                });
            });

            function saveProfile() {
                $('#password-confirmation').modal('hide');
                $.ajax({
                    url: '/admin/profile',
                    data: $('#admin-profile-form').serialize(),
                    type: 'post',
                    dataType: 'json',
                    success: function () {
                        location.reload(true);
                    },
                    error: function (errors) {
                        $.each($.parseJSON(errors.responseText), function (key, value) {
                            key = $('#' + key);
                            key.parent('div').addClass('has-error');
                            key.next('span').html(value);
                            key.next('span').addClass('help-block');
                        });
                    }
                });
            }

            function removeErrors(input) {
                input.find('div').removeClass('has-error');
                input.find('span').html('');
                input.find('span').removeClass('help-block');
            }


            $("#removeBtn").click(function (e) {
                e.preventDefault();
                let chk = $('.gallery-section input:radio:checked');
                let value = chk.attr('value');
                $.ajax({
                    url: '/admin/delete-profile-picture',
                    data: '_token=' + '{{csrf_token()}}' + '&oldPicture=' + value,
                    type: 'post',
                    dataType: 'json',
                    success: function () {
                        chk.next('label').remove();
                        chk.remove();
                    }
                });
            });

        </script>
    </section>
@endsection