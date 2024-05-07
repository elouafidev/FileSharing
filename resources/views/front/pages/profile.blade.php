@extends('front.layouts.app')
@section('content')
    <!-- content @s -->
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">{{__('Profile')}}</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{route('profile')}}" class="form-validate" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-full-name">{{__('Full Name')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-full-name" name="name" value="{{$user->name}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-email">{{__('Email address')}}</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-mail"></em>
                                                        </div>
                                                        <input type="text" class="form-control" id="fv-email" name="email" value="{{old('email',$user->email)}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-subject">{{__('password')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-password" name="password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-subject">{{__('Confirm Password')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-password" name="password_confirmation" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">{{__('Submit')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
