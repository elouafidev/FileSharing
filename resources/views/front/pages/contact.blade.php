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
                                    <p class="lead">Vous avez repéré un bug dans notre système ou avez une suggestion pour une nouvelle fonctionnalité ? Votre contribution est précieuse pour nous aider à améliorer notre plateforme. Que vous ayez rencontré un problème technique, une anomalie d'affichage ou que vous ayez simplement une idée brillante à partager, nous sommes tout ouïe ! Notre équipe technique est prête à examiner vos retours et à travailler activement pour résoudre tout problème et intégrer de nouvelles fonctionnalités qui amélioreront votre expérience utilisateur. N'hésitez pas à nous faire part de vos observations ; ensemble, nous pouvons façonner l'avenir de notre plateforme pour répondre au mieux à vos besoins et à vos attentes. Contactez-nous dès maintenant pour partager vos idées et vos retours d'expérience !</p>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">

                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <form action="#" class="form-validate">
                                        <div class="row g-gs">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-full-name">{{__('Full Name')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-full-name" name="fv-full-name" required>
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
                                                        <input type="text" class="form-control" id="fv-email" name="fv-email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-subject">{{__('Subject')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="fv-subject" name="fv-subject" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="fv-message">{{__('Message')}}</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control-sm" id="fv-message" name="fv-message" placeholder="{{__('Write your message')}}" required></textarea>
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
