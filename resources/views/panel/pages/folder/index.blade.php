@extends('panel.layouts.app')

@section('title', 'Storage')
@section('head')
    <style>
        tr[data-href]:hover td {
            background: #c7d4dd !important;
        }
        tr[data-href] {
            cursor: pointer;
        }
        .paths .box-title{
            color: #404a53;
        }
        .mr-2{ margin-right: 2rem}
    </style>
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop
@section('content')
    <div class="container">
        <div class="box ">
            <div class="box-header with-border">
                <div class="col-md-5">
                    <div class="row">
                        @if($folder->parent_id != null)
                            <div class="col-md-4">
                                <a type="button" class="btn btn-block btn-default " href="{{ Route('panel.folder.index',[ 'id' =>  $folder->parent_id ]) }}">...</a>
                            </div>
                        @endif
                        <div class="col-md-4">
                            <a type="button" class="btn btn-block btn-default " href="{{Route('panel.folder.create',[ 'parent_id' =>  $folder->id]) }}">Create Folder</a>
                        </div>
                        <div class="col-md-4">
                            <a type="button" class="btn btn-block btn-default " href="{{ Route('panel.folder.sheet.create',[ 'folder_id' =>   $folder->id ]) }}">Create Sheet</a>
                        </div>
                    </div>
                </div>
                <label>
                </label>
            </div>
            <div class="box-header with-border paths">
                @foreach($folder->Path() as $parentFolder)
                    <a href="{{ Route('panel.folder.index',[ 'id' => $parentFolder['id']]) }}" >{{$parentFolder['name']}}</a><a>/</a>
                @endforeach
            </div>
            <div class="box-body">
                <table id="table_id"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($folders as $folder)
                        <tr data-href="{{ Route('panel.folder.index',[ 'id' => $folder['id']]) }}">
                            <td><i class="fa fa-fw fa-folder mr-2"></i>{{$folder['id']}} </td>
                            <td>{{$folder['name'].($folder['hidden'] == true ?' (Hidden)':'')}} </td>
                            <td>{{$folder['description']}} </td>
                            <td>
                                <form action="{{Route('panel.folder.show',[ 'id' => $folder['id']])}} " method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button onclick="return(confirm('Are you sure you want to delete this entry?'));" type="submit" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-trash"></span></button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{Route('panel.folder.edit',[ 'id' => $folder['id']])}} " class="btn btn-warning btn-block"><span class="glyphicon glyphicon-pencil"></span> </a>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($Sheets as $Sheet)
                        <tr data-href="{{Route('panel.folder.sheet.edit',[ 'folder_id' => $folder->id,'id' => $Sheet->id]) }}">
                            <td><i class="fa fa-fw fa-file mr-2"></i>{{$Sheet->id}} </td>
                            <td>{{$Sheet->title.($Sheet->hidden == true ?' (Hidden)':'')}} </td>
                            <td>{{$Sheet->description}} </td>
                            <td>
                                <form action="{{Route('panel.folder.sheet.edit',[ 'folder_id' => $folder->id,'id' => $Sheet->id])}} " method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button onclick="return(confirm('Are you sure you want to delete this entry?'));" type="submit" class="btn btn-danger btn-block">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
@section('script')
    {{-- DataTables --}}
    <script src="{{asset('panel/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('panel/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    {{-- page script --}}
    <script>

        document.addEventListener("DOMContentLoaded",() =>{
            const rows = document.querySelectorAll("tr[data-href]");
            rows.forEach(row =>{
                row.addEventListener("click",() => {
                    window.location.href = row.dataset.href;
                });
            });
        });

        $(function () {
            $('#table_id').DataTable({
                'paging'      : false,
                'lengthChange': true,
                'searching'   : false,
                'ordering'    : false,
                'info'        : true,
                'autoWidth'   : true
            });
        });
    </script>
@stop
