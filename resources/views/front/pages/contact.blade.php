@extends('front.layouts.app')
@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">{{__('Contact Us')}}</h2>
                                <div class="nk-block-des">
                                    <p class="lead">Signalez un bug ou suggérez une fonctionnalité ! Vos commentaires sont essentiels pour améliorer notre plateforme. Contactez-nous pour toute anomalie ou idée. Notre équipe est là pour vous écouter et améliorer votre expérience utilisateur. Ensemble, façonnons l'avenir de notre plateforme !</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">

                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="{{route('contact')}}" class="form-validate" method="post">
                                        @csrf
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-full-name">{{__('Full Name')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-full-name" name="name" required>
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
                                                        <input type="text" class="form-control" id="fv-email" name="email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-subject">{{__('Subject')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-subject" name="subject" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-message">{{__('Message')}}</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control-sm" id="fv-message" name="message" placeholder="{{__('Write your message')}}" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">{{__('send')}}</button>
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
