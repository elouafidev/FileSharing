@extends('front.layouts.app')
@section('head')
    <style>
        .nk-error-head {
            font-size: 49px;
        }
    </style>
@endsection

@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-middle wide-xs mx-auto">
            <div class="nk-block-content nk-error-ld text-center">
                    <h1 class="nk-error-head">{{__('Do Not Have Access')}}</h1>
                <p class="nk-error-text">{{__('You do not have access to read this file. You need to log in or register')}}</p>
                <a href="{{route('login')}}" class="btn btn-lg btn-primary mt-2">{{__('Login')}}</a>
                <a href="{{route('register')}}" class="btn btn-lg btn-primary mt-2">{{__('Register')}}</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
