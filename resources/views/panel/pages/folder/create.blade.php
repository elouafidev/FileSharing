@extends('panel.layouts.app')

@section('title', __('Create Folder'))
@section('head')
@stop
@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{__('Create Folder')}}</h3>
            </div>
            <div class="box-header with-border paths">
                @foreach(\App\Models\Folder::find($parent_id)->Path() as $parentFolder)
                    <a href="{{ Route('panel.folder.index',[ 'id' => $parentFolder['id']]) }}" >{{$parentFolder['name']}}</a><a>/</a>
                @endforeach
            </div>
            {{-- /.box-header --}}
            {{-- form start --}}
            <form action=" {{Route('panel.folder.create',[ 'parent_id' => $parent_id ])}} " method="post">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input name="parent_id" type="hidden" value="{{$parent_id}}">
                    <div class="form-group">
                        <label>{{__('Name')}} :</label> <br>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">

                    </div>

                    <div class="form-group">
                        <label>{{__('Description')}} :</label> <br>
                        <textarea class="form-control" name="description">{{old('description')}}</textarea>

                    </div>
                    <div class="form-group">
                        <label>{{__('Hidden')}} : </label>
                        <input type="hidden" name="hidden" value="0">
                        <input type="checkbox"  name="hidden" value="1">

                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ Route('panel.folder.index',['id' => $parent_id])}} " class="btn btn-info "> {{__('Retour')}} </a>
                    <input type="Submit" value="Create" class="btn btn-success ">
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
@stop
