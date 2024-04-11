@extends('panel.layouts.app')

@section('title', 'Create Folder')
@section('head')
@stop

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Folder</h3>
                <div style="padding-left: 10px;">
                    @if (count($errors) > 0)
                        <div class="container alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul >
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="container alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
            </div>
            {{-- /.box-header --}}
            {{-- form start --}}
            <form action=" {{Route('panel.folder.create',[ 'parent_id' => $parent_id ])}} " method="post">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input name="parent_id" type="hidden" value="{{$parent_id}}">
                    <div class="form-group">
                        <label>Name :</label> <br>
                        <input type="text" class="form-control" name="name" value="{{old('Name')}}">

                    </div>

                    <div class="form-group">
                        <label>Description :</label> <br>
                        <textarea class="form-control" name="description">{{old('Description')}}</textarea>

                    </div>
                    <div class="form-group">
                        <label>Hidden : </label>
                        <input type="hidden" name="hidden" value="0">
                        <input type="checkbox"  name="hidden" value="1">

                    </div>

                </div>
                <div class="box-footer">
                    <a href="{{ Route('panel.folder.index',['id' => $parent_id])}} " class="btn btn-info "> Retour </a>
                    <input type="Submit" value="Create" class="btn btn-success ">
                </div>
            </form>
        </div>
    </div>
@stop
@section('script')
    <script>
        $('.sidebar-menu').find('.Storage').addClass('active');
    </script>
@stop
