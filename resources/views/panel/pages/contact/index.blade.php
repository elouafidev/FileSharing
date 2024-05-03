@extends('panel.layouts.app')

@section('title', 'Contacts List')
@section('head')
    <style>
        tr[data-href]:hover td {
            background: #c7d4dd !important;
        }
        tr[data-href] {
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="{{asset('panel/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> Contacts list</h3>
            </div>
            {{-- /.box-header --}}
            {{-- form start --}}

            <div class="box-body">
                <table id="table_id"  class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Tools</th>
                    <tbody>
                    @foreach($Contacts as $Contact)
                        <tr data-href="{{route('panel.contact.show',['id'=>$Contact->id])}}">
                            <td>{{$Contact->id}} </td>
                            <td>{{$Contact->full_name}} </td>
                            <td>{{$Contact->email}} </td>
                            <td>{{$Contact->subject}} </td>
                            <td>
                                <form action="{{route('panel.contact.show',['id'=>$Contact->id])}} " method="post">
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
            console.log(rows);
            rows.forEach(row =>{
                row.addEventListener("click",() => {
                    window.location.href = row.dataset.href;
                });
            });
        });
        $(function () {
            $('#table_id').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>
@stop
