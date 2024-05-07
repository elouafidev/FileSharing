@extends('panel.auth.layouts.app')
@section('head')
    {{-- iCheck --}}
    <link rel="stylesheet" href="{{asset('panel/plugins/iCheck/square/blue.css')}}">
@endsection
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{{config('app.name')}}</b> PANEL</a>
        </div>
        {{-- /.login-logo --}}
        <div class="login-box-body">
            <p class="login-box-msg">{{__('Sign in to start your session')}}</p>
            @if(\Session::has('message'))
                <p class="alert alert-info">
                    {{ \Session::get('message') }}
                </p>
            @endif
                <form  method="POST" action="{{ route('panel.login') }}">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback  {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" name="email" class="form-control " placeholder="{{__('Email')}}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" name="password" class="form-control " placeholder="{{__('Password')}}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div> --}}
                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label class="control-label">{{__('Captcha')}}</label>
                            <div class="pull-center">
                                {{--                    {!! app('captcha')->display() !!}--}}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        {{ $errors->first('g-recaptcha-response') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember"> {{__('Remember Me')}}
                                </label>
                            </div>
                        </div>
                        {{-- /.col --}}
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('Sign In')}}</button>
                        </div>
                        {{-- /.col --}}
                    </div>
                </form>

        </div>
        {{-- /.login-box-body --}}
    </div>
    {{-- /.login-box --}}
@endsection
@section('script')
    <script src="{{asset('panel/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
    {{--{!! NoCaptcha::renderJs() !!}--}}
@endsection
