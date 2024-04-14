@extends('panel.layouts.app')

@section('title', 'Edit Folder')
@section('head')
@stop
@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Folder</h3>
            </div>
            <div class="box-header with-border paths">
                @foreach($folder->Path() as $parentFolder)
                    <a href="{{ Route('panel.folder.index',[ 'id' => $parentFolder['id']]) }}" >{{$parentFolder['name']}}</a><a>/</a>
                @endforeach
            </div>
            {{-- /.box-header --}}
            {{-- form start --}}
            <form action=" {{Route('panel.folder.edit',[ 'id' => $folder->id ])}} " method="post">
                <div class="box-body">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="form-group">
                        <label>Name :</label> <br>
                        <input type="text" class="form-control" name="name" value="{{old('name',$folder->name)}}">

                    </div>

                    <div class="form-group">
                        <label>Description :</label> <br>
                        <textarea class="form-control" name="description">{{old('description',$folder->description)}}</textarea>

                    </div>
                    <div class="form-group">
                        <label>Hidden : </label>
                        <input type="hidden"  name="hidden"  value="0">
                        <input type="checkbox"  name="hidden"  value="1" {{(old('hidden') == '1' || $folder->hidden == true) ?'checked':''}}>

                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ Route('panel.folder.index',['id' => $folder->parent_id])}} " class="btn btn-info "> Retour </a>
                    <input type="Submit" value="Create" class="btn btn-success ">
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
    <script>

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        });
    </script>
@stop
