@extends('layout')
<!--
*
* Page Specific CSS
*
-->
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ url('bower_components/morrisjs/morris.css') }}">
@stop




<!--
*
* Content Starts Here
*
-->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Affiliates</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All Affiliates
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Url</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($affiliates as $affiliate)
                        	<tr>
	                        	<td>{{ $affiliate->name }}</td>
	                        	<td><a href="{{ $affiliate->url }}">{{ $affiliate->url }}</a> </td>
	                        	<td><a class="btn btn-primary" href="/affiliates/{{ $affiliate->id }}/edit">Edit</a></td>
                        	</tr>
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
@stop



<!--
*
* Page Specific Javascripts
*
-->
@section('page-javascripts')
<!-- DataTables JavaScript -->
<script src="{{ url('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
        });


    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true,
        });

    });
</script>
@stop
