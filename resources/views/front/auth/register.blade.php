@extends('front.layouts.app')

@section('content')
    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
        <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">{{__('Register')}}</h4>
                        <div class="nk-block-des">
                            <p>{{__('Create New FileSharing Account')}}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">{{__('Name')}}</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg  @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" id="name" placeholder="{{__('Enter your name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">{{__('Email')}}</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-lg  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" id="email" name="email" placeholder="{{__('Enter your email address')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Passcode</label>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="new-password" id="password" name="password" placeholder="{{__('Enter your passcode')}}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password_confirmation">Confirmation Passcode</label>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password_confirmation">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" id="password_confirmation"  placeholder="{{__('Enter your passcode')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">{{__('Register')}}</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{route('login')}}"><strong>{{__('Sign in instead')}}</strong></a>
                </div>
                <div class="text-center pt-4 pb-3">
                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                </div>
                <ul class="nav justify-center gx-8">
                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
