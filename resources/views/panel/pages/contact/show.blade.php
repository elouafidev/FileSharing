@extends('panel.layouts.app')
@section('title', __('show Contact'))
@section('head')
    <style>
        .group{
            margin-bottom: 15px;
        }
    </style>
@stop


@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('Contact')}}</h3>
            </div>
            {{-- /.box-header --}}
            {{-- form start --}}

            <form  method="post" id="form"  role="form">
                <div class="box-body">
                    <div class="group">
                        <label>id :</label> <br>
                        <input type="text" class="form-control" value="{{old('id',$Contact->id)}}"  readonly>
                    </div>
                    <div class="form-group ">
                        <label>{{__('Full Name')}} :</label> <br>
                        <input type="text" class="form-control" name="FullName" value="{{old('full_name',$Contact->full_name)}}"  readonly>

                    </div>

                    <div class="form-group">
                        <label>{{__('Subject')}} :</label> <br>
                        <input type="text" class="form-control" name="Subject" value="{{old('subject',$Contact->subject)}}"  readonly>
                    </div>

                    <div class="form-group">
                        <label>{{__('Message')}} :</label> <br>
                        <textarea class="form-control" name="Message" readonly>{{  old('message',$Contact->message)}} </textarea>

                    </div>
                </div>
                {{-- /.box-body --}}

                <div class="box-footer">
                    <a href="{{ route('panel.contact.index')}} " class="btn btn-info  "> {{__('Retour')}} </a>
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
@stop
