@extends('layout.web_layout')
@section('content')
<div class="bg-white pulldown">
    <div class="content content-boxed overflow-hidden">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="push-30-t push-50 animated fadeIn">
                    <!-- Login Title -->
                    <div class="text-center">
                    <img src="{{asset('img/logotrans2.png')}}" style="width:17%;">
                    <h1 class="h3 push-10-t">Login</h1>
                     <!--    <i class="fa fa-2x fa-circle-o-notch text-primary"></i> -->
                       <!--  <p class="text-muted push-15-t">A perfect match for your project</p>1 -->
                    </div>
                    <!-- END Login Title -->
                    {{-- Confide::makeLoginForm()->render() --}}
                    @if (Session::get('error'))
                        <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                    @endif

                    @if (Session::get('notice'))
                        <div class="alert">{{{ Session::get('notice') }}}</div>
                    @endif
                    <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                        <fieldset>
                            <div class="form-group">
                                <label for="email">{{{ Lang::get('confide::confide.e_mail') }}}/Username</label>
                                <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}/Username" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                            </div>
                            <div class="form-group">
                            <label for="password">
                                {{{ Lang::get('confide::confide.password') }}}
                            </label>
                            <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                            <p class="help-block">
                                <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                            </p>
                            </div>
                            <div class="checkbox">
                                <label for="remember">
                                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
                                </label>
                            </div>
                            <div class="form-group push-30-t">
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                    <button class="btn btn-sm btn-block btn-primary" type="submit">Log in</button>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <button tabindex="3" type="submit" class="btn btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                            </div> -->
                        </fieldset>
                    </form>
                    <!-- Login Form -->
                    <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <!-- <form class="js-validation-login form-horizontal push-30-t" action="index.html" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="text" id="login-username" name="login-username">
                                    <label for="login-username">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <input class="form-control" type="password" id="login-password" name="login-password">
                                    <label for="login-password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label class="css-input switch switch-sm switch-primary">
                                    <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                </label>
                            </div>
                            <div class="col-xs-6">
                                <div class="font-s13 text-right push-5-t">
                                    <a href="base_pages_reminder_v2.html">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group push-30-t">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                <button class="btn btn-sm btn-block btn-primary" type="submit">Log in</button>
                            </div>
                        </div>
                    </form> -->
                    <!-- END Login Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop