@extends('panel.layouts.app')

@section('title', 'show Profile')
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
                <h3 class="box-title">{{__('Profile')}}</h3>
            </div>
            {{-- /.box-header --}}
            {{-- form start --}}

            <form  method="post" id="form"  role="form" action="{{route('panel.user.update')}}">
                @csrf
                @method('put')
                <div class="box-body">
                    <div class="form-group ">
                        <label>{{__('Full name')}} :</label> <br>
                        <input type="text" class="form-control" name="name" value="{{old('name',$user->name)}}"  required>
                    </div>

                    <div class="form-group">
                        <label>{{__('Email')}} :</label> <br>
                        <input type="text" class="form-control" name="email" value="{{old('email',$user->email)}}"  required>
                    </div>

                    <div class="form-group">
                        <label>{{__('password')}} :</label> <br>
                        <input type="text" class="form-control" name="password"  required>
                    </div>
                    <div class="form-group">
                        <label>{{__('confirmation password')}} :</label> <br>
                        <input type="text" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                {{-- /.box-body --}}

                <div class="box-footer">
                    <button type="submit" class="btn btn-info">{{__('save')}}</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
@stop
