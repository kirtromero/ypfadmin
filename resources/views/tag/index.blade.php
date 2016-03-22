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
		<h1 class="page-header">Tags</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				All tags
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables">
						<thead>
							<tr>
								<th>Name</th>
								<th>Sort</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
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
$(document).ready(function() {
	$('#dataTables').DataTable({
		responsive: true,
		ajax: '/tags/all',
		source: 'data',
		processing: true,
        serverSide: true,
		columns: [
	        { data: 'name' },
	        { data: 'sort' },
	        { data: 'active' },
	        { data: 'html' }
	    ]
	});

	$("#dataTables").on('click', '.activate',function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			method: "POST",
			url: "/tags/activate",
			data: { id: id }
		})
		.done(function( msg ) {
			alert( "Data Saved: " + msg );
		});
	});
});
</script>
@stop
