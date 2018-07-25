@extends('layouts.master')
@section('page-content')

    <div class="fh5co-contact animate-box">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-md-push-1 animate-box">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissable" id="message">
                            <strong>Validation Failed!</strong>
                            Please Check if your Account is already acitvate.
                            If not please contact site support <a href="{{route('contact')}}">Support</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div id="message"></div>
                    <div class="container regs">
                        <ul class="nav nav-tabs col-md-8 col-md-offset-2 ">
                            <li id="reg-click" class="active"><a data-toggle="tab" href="#register">Register</a></li>
                            <li id="log-click"><a data-toggle="tab" href="#login">Login</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="register" class="tab-pane fade in active ">
                                <div class="col-md-8 animate-box">
                                    <div id="form-section">
                                        <form id="registerForm" method="POST" action="{{ route('register') }}"
                                              aria-label="{{ __('Register') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name"
                                                           value="{{ old('name') }}">
                                                    <span class="error" role="alert"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="reg-email"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="email"
                                                           class="form-control"
                                                           name="email"
                                                           value="{{ old('email') }}">
                                                    <span class="error" role="alert"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="reg-password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                           class="form-control"
                                                           name="password">
                                                    <span class="error" role="alert"><strong></strong>
                                                        </span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password"
                                                           class="form-control"
                                                           name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button id="registerSubmit" type="submit"
                                                                    class="btn btn-primary">
                                                                {{ __('Register') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="login" class="tab-pane">
                                <div class="col-md-8 animate-box ">
                                    <div id="f-height"></div>
                                    <div id="form-section">
                                        <form id="loginForm" method="POST" action="{{ route('login') }}"
                                              aria-label="{{ __('Login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="log-email"
                                                       class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="log-email" type="email" class="form-control" name="email"
                                                           value="{{ old('email') }}" autofocus>
                                                    <span class="error" role="alert"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="log-password"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="log-password" type="password" class="form-control"
                                                           name="password">
                                                    <span class="error" role="alert"></span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>

                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#reg-click').click(function (e) {
            $('#log-click').removeClass('active');
            $('#reg-click').addClass('active');
        });
        $('#log-click').click(function (e) {
            $('#reg-click').removeClass('active');
            $('#log-click').addClass('active');
        });

        /*
        * Register Form Request
        * */
        let registerForm = $('#registerForm');

        registerForm.submit(function (e) {
            let width = $('#form-section').width();
            let data = registerForm.serialize();
            e.preventDefault();
            removeErrors(registerForm);
            $.ajax({
                url: '/register',
                type: 'post',
                data: data,
                datatye: 'json',
                success: function (response) {
                    let message = '<div style="width:' + width + 'px" class="alert alert-success" id="message">' +
                        '<strong>Register Sucessfull!</strong> ' +
                        'Please Check Your Email For the Validation Link.' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';
                    $('#message').html(message);
                },
                error: function (errors) {
                    let message = '<div style="width:' + width + 'px" class="alert alert-danger" id="message">' +
                        '<strong>Error Encounter!</strong> ' +
                        'You should check in on some of those fields below.' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';
                    $('#message').html(message);
                    $.each(errors.responseJSON.errors, function (key, value) {
                        key = $('#' + key);
                        key.parent('div').addClass('has-error');
                        key.next('span').html(value[0]);
                        key.next('span').addClass('help-block');
                    });
                }
            });
        });

        /*
       * Login Form Request
       * */

        let loginForm = $('#loginForm');
        loginForm.submit(function (e) {
            e.preventDefault();
            removeErrors(loginForm);
            let loginData = loginForm.serialize();
            $.ajax({
                url: '/login',
                type: 'post',
                data: loginData,
                datatye: 'json',
                success: function (response) {
                    window.location.href = "/";
                },
                error: function (errors) {
                    $.each($.parseJSON(errors.responseText), function (key, value) {
                        key = $('#log-' + key);
                        key.parent('div').addClass('has-error');
                        key.next('span').html(value);
                        key.next('span').addClass('help-block');

                    });
                }
            });
        });

        function removeErrors(input) {
            input.find('div').removeClass('has-error');
            input.find('span').html('');
            input.find('span').removeClass('help-block');
        }

    </script>

@endsection



