@extends('layouts.front.master')
@section('page-content')
    <header id="fh5co-header" class="fh5co-reg registerHeader" role="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <div class="display-t">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-project">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2><strong>Let</strong>'s Get Started</h2>
                </div>
            </div>
            <div class="row">
                <div id="message"></div>
                <div class="container regs">
                    <ul class="nav nav-tabs col-md-8 col-md-offset-2 text-center">
                        <li id="reg-click" class="active"><a data-toggle="tab" href="#register">Register</a></li>
                        <li id="log-click"><a data-toggle="tab" href="#login">Login</a></li>
                    </ul>
                    <div class="tab-content col-md-offset-2 " style="margin-top: 100px">
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
                        <div id="login" class="tab-pane fade in">
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


@endsection



