@extends('front.layouts.app')
@section('head')
@endsection

@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-middle wide-xs mx-auto">
            <div class="nk-block-content nk-error-ld text-center">
                <h1 class="nk-error-head">@yield('code')</h1>
                <h3 class="nk-error-title">Oops! @yield('title')</h3>
                <p class="nk-error-text">@yield('message')</p>
                <a href="{{route('home')}}" class="btn btn-lg btn-primary mt-2">{{__('Back To Home')}}</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
