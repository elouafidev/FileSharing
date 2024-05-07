@extends('panel.layouts.app')

@section('title', 'Create Sheet')
@section('head')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('panel/plugins/iCheck/all.css')}}">
    <style>
        .files{
            border: 1px solid #ccc;
            padding: 20px;
        }
    </style>
@stop

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> {{__('Create Sheet')}}</h3>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <a href="{{ Route('panel.folder.index',['id' => $folder_id])}} " class="btn btn-info  ">
                                {{__('Retour')}} </a>
                        </div>
                        <div class="col-md-4">
                            <input type="button" value="{{__('Create')}}" class="btn btn-success" onclick="$('#formCreateSheet').submit();">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{Route('panel.folder.sheet.create',[ 'folder_id' => $folder_id ])}}" method="post" id="formCreateSheet" class="form">
                <div class="box-body">
                    <input type="hidden" name="folder_id" value="{{$folder_id}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>{{__('title')}} :*</label> <br>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" >
                    </div>
                    <div class="form-group Description">
                        <label>{{__('Description')}} :</label> <br>
                        <textarea class="form-control" name="description">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group Description">
                        <label>{{__('Content')}} ({{__('Documentation')}}):</label> <br>
                        <textarea class="form-control" name="content">{{old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>{{__('Hidden')}} :</label>
                                <input type="hidden" name="hidden" value="0">
                                <input type="checkbox"  class="minimal" name="hidden" value="1" {{ !empty(old('hidden')) && old('hidden') == 1 ? 'checked' :''}}>
                            </div>
                        </div>
                    </div>
                    <label>{{__('Files')}} :</label> <br>
                    <div class="form-group files" id="filesgroup">
                        <div class="form-group">
                            <button type="button" class="btn btn-success" name="add_file">{{__('Add File')}}</button>
                        </div>
                        @if(!empty(old('Files')))
                            @foreach(old('Files') as  $key => $File)

                                <div class="files row">
                                    <label>{{__('ADD File ID')}}: {{$key}}</label> <br>
                                    <button type="button" name="delete_file" data-id="{{$key}}" data-type="add">{{__('delete')}}</button>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{__('File Name')}} :</label>
                                            <input type="text" class="form-control" name="Files[{{$key}}][name]" value="{{$File['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{__('url')}} :</label>
                                            <input type="url" class="form-control" name="Files[{{$key}}][url]" value="{{$File['url']}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{__('Password')}} :</label>
                                            <input type="text" class="form-control" name="Files[{{$key}}][password]" value="{{$File['password']}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{__('Size')}} :</label>
                                            <input type="text" class="form-control" name="Files[{{$key}}][size]" value="{{$File['size']}}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
    <!-- iCheck 1.0.1 -->
    <script src="{{asset('panel/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });
    </script>
    <script>
        var filen = 0;
        $('button[name=add_file]').on( "click", function (){
            filen= filen+1;
            $('#filesgroup').append(`<div class="files row">
                                    <label>{{__('ADD File ID')}}: ${filen}</label> <br>
                                    <button type="button" name="delete_file" data-id="${filen}" data-type="add">{{__('delete')}}</button>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{__('File Name')}} :</label>
                                                <input type="text" class="form-control" name="Files[${filen}][name]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{__('url')}} :</label>
                                                <input type="url" class="form-control" name="Files[${filen}][url]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{__('Password')}} :</label>
                                                <input type="text" class="form-control" name="Files[${filen}][password]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>{{__('Size')}} :</label>
                                                <input type="text" class="form-control" name="Files[${filen}][size]" >
                                            </div>
                                        </div>
                                    </div>`);
            $('button[name=delete_file]').on( "click", function () {
                $(this).parent().remove();
            });
        });

    </script>
@stop
