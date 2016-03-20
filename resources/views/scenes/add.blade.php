@extends('layout')
<!--
*
* Page Specific CSS
*
-->
@section('page-css')
<link rel="stylesheet" type="text/css" href="http://youpornflix.com/ypf/public/bower_components/morrisjs/morris.css">
@stop




<!--
*
* Content Starts Here
*
-->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tables</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="form"
                	role="form"
					method="post"
					action="/scenes">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Embed Script</label>
                        <input class="form-control" name="embed">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input class="form-control" name="duration">
                    </div>
                    <div class="form-group">
                        <label>Primary Thumbnail</label>
                        <input class="form-control" name="primary_thumbnail">
                    </div>
                    <div class="form-group">
                        <label>Thumbnails</label>
                        <textarea class="form-control" name="thumbnails"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="links">
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <textarea class="form-control" name="tags"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Affiliate</label>
                        <select name="affiliate_id" class="form-control">
                        	<option value="1">Hub Traffice</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Site</label>
                        <select name="site_id" class="form-control">
                        	<option value="1">YouPorn Filx</option>
                        </select>
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
<script src="http://youpornflix.com/ypf/public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="http://youpornflix.com/ypf/public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
                responsive: true
        });
    });
</script>
@stop
