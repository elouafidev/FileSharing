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
                <h3 class="box-title"> Edit Sheet</h3>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <a href="{{ Route('panel.folder.index',['id' => $sheet->folder_id])}} " class="btn btn-info  "> Retour </a>
                        </div>
                        <div class="col-md-4">
                            <input type="button" value="Create" class="btn btn-success" onclick="$('#formCreateSheet').submit();">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{Route('panel.folder.sheet.edit',[ 'folder_id' => $sheet->folder_id ,'id'=>$sheet->id])}}" method="post" id="formCreateSheet" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="form-group">
                        <label>title :*</label> <br>
                        <input type="text" class="form-control" name="title" value="{{old('title',$sheet->title)}}" >
                    </div>
                    <div class="form-group Description">
                        <label>Description :</label> <br>
                        <textarea class="form-control" name="description">{{old('description',$sheet->description)}}</textarea>
                    </div>
                    <div class="form-group Description">
                        <label>Content ({{__('Documentation')}}):</label> <br>
                        <textarea  class="form-control" id="content" name="content" rows="10" cols="80">{{old('content',$sheet->content)}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hidden :</label>
                                <input type="hidden" name="hidden" value="0">
                                <input type="checkbox"  class="minimal" name="hidden" value="1" {{ !empty(old('hidden',$sheet->hidden)) && old('hidden') == 1 ? 'checked' :''}}>
                            </div>
                        </div>
                    </div>
                    <label>Files :</label> <br>
                    <div class="form-group files" id="filesgroup">
                        <div class="form-group">
                            <button type="button"  class="btn btn-success" name="add_file">{{__('Add File')}}</button>
                        </div>

                        @foreach($sheet->Files()->get() as  $key => $File)
                            <div class="files row">
                                <label>ADD File ID: {{$File->id}}</label> <br>
                                <button type="button" name="delete_data_file" data-id="{{$File->id}}"  class="btn btn-danger">{{__('delete')}}</button>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>File Name :</label>
                                        <input type="text" class="form-control" name="Files[{{$File->id}}][name]" value="{{$File['name']}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>url Host :</label>
                                        <input type="url" class="form-control" name="Files[{{$File->id}}][url]" value="{{$File['url']}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input type="text" class="form-control" name="Files[{{$File->id}}][password]" value="{{$File['password']}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Size :</label>
                                        <input type="text" class="form-control" name="Files[{{$File->id}}][size]" value="{{$File['size']}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if(!empty(old('add_files')))
                            @foreach(old('add_files') as  $key => $File)
                                <div class="files row">
                                    <label>ADD File ID: {{$key}}</label> <br>
                                    <button type="button" name="delete" data-id="{{$key}}" class="btn btn-danger">{{__('delete')}}</button>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>File Name :</label>
                                            <input type="text" class="form-control" name="files[{{$key}}][name]" value="{{$File['name']}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>url Host :</label>
                                            <input type="url" class="form-control" name="files[{{$key}}][url]" value="{{$File['url']}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="text" class="form-control" name="files[{{$key}}][password]" value="{{$File['password']}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Size :</label>
                                            <input type="text" class="form-control" name="files[{{$key}}][size]" value="{{$File['size']}}">
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
    <script src="{{asset("panel/plugins/ckeditor/ckeditor.js")}}"></script>
    <script>

        $(function(){
            CKEDITOR.replace('content');
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });
            var filen = {{empty(old('add_files')) ? 0 : count(old('add_files')) }};

            $('button[name=add_file]').on( "click", function (){
                filen= filen+1;
                $('#filesgroup').append(`<div class="files row">
                                    <label>ADD File ID: ${filen}</label> <br>
                                    <button type="button" name="delete_file" class="btn btn-danger">{{__('delete')}}</button>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>File Name :</label>
                                                <input type="text" class="form-control" name="afiles[${filen}][name]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>url Host :</label>
                                                <input type="url" class="form-control" name="afiles[${filen}][url]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Password :</label>
                                                <input type="text" class="form-control" name="afiles[${filen}][password]" >
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Size :</label>
                                                <input type="text" class="form-control" name="afiles[${filen}][size]" >
                                            </div>
                                        </div>
                                    </div>`);
                $('button[name=delete_file]').on( "click", function () {
                    $(this).parent().remove();
                });
            });
            $('button[name=delete_data_file]').on( "click", function () {
                $(this).parent().parent().append(`<input type="text" name="dfiles[]" value="${$(this).data('id')}" hidden="hidden">`);
                $(this).parent().remove();
            });
        })

    </script>
@stop
