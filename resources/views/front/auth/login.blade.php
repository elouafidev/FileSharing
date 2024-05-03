@extends('front.layouts.app')

@section('content')
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Sign-In</h4>
                        <div class="nk-block-des">
                            <p>{{__('Access the FileSharing panel using your email and passcode.')}}</p>
                        </div>
                    </div>
                </div>
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">{{__('Email or Username')}}</label>
                        </div>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" id="default-01" placeholder="Enter your email address or username">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">{{__('Passcode')}}</label>
                            @if (Route::has('password.request'))
                                <a class="link link-primary link-sm" href="{{ route('password.request') }}">{{__('Forgot Code?')}}</a>
                            @endif
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="{{__("Enter your passcode")}}">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">{{__('Sign in')}}</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> {{__('New on our platform?')}} <a href="{{route('register')}}">{{__('Create an account')}}</a>
                </div>
                <div class="text-center pt-4 pb-3">
                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                </div>
                <ul class="nav justify-center gx-4">
                    <li class="nav-item"><a class="nav-link" href="{{route('auth.google')}}">Google</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
