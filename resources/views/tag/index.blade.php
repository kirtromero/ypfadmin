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
							@foreach($tags as $tag)
							<tr class="odd gradeX">
								<td>{{ $tag->name }}</td>
								<td>{{ $tag->sort }}</td>
								<td>{{ $tag->active }}</td>
								<td>
									@if($tag->active == 0)
									<a href="/tags/{{ $tag->id }}/edit" data-id="{{ $tag->id }}" class="btn btn-xs btn-info activate">Activate</a>
									@else
									<a href="/tags/{{ $tag->id }}/edit" data-id="{{ $tag->id }}" class="btn btn-xs btn-warning activate">Deactivate</a>
									@endif
									<a href="/tags/{{ $tag->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
									<form action="/tags/{{ $tag->id }}" method="POST">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button class="btn btn-xs btn-danger" type="submit">Delete</button>
									</form>
								</td>
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
<script src="http://youpornflix.com/ypf/public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="http://youpornflix.com/ypf/public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	$('#dataTables').DataTable({
		responsive: true
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
