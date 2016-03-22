@extends('layout')
<!--
*
* Page Specific CSS
*
-->
@section('page-css')
<link rel="stylesheet" type="text/css" href="/bower_components/morrisjs/morris.css">
@stop




<!--
*
* Content Starts Here
*
-->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Imports</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                XML
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="form"
                	role="form"
					method="post"
					action="/imports">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label>XML Import</label>
                        <input class="form-control" name="url">
                    </div>
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>

				</form>
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
    $(document).ready(function() {
        $('#dataTables').DataTable({
                responsive: true
        });
    });
</script>
@stop
