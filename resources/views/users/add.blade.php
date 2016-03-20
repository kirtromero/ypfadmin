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
				<div class="col-lg-6">
					<form role="form">
						<div class="form-group">
							<label>Text Input</label>
							<input class="form-control">
							<p class="help-block">Example block-level help text here.</p>
						</div>
						<div class="form-group">
							<label>Text Input with Placeholder</label>
							<input class="form-control" placeholder="Enter text">
						</div>
						<div class="form-group">
							<label>Static Control</label>
							<p class="form-control-static">email@example.com</p>
						</div>
						<div class="form-group">
							<label>File input</label>
							<input type="file">
						</div>
						<div class="form-group">
							<label>Text area</label>
							<textarea class="form-control" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label>Checkboxes</label>
							<div class="checkbox">
								<label>
									<input type="checkbox" value="">Checkbox 1
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value="">Checkbox 2
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" value="">Checkbox 3
								</label>
							</div>
						</div>
						<div class="form-group">
							<label>Inline Checkboxes</label>
							<label class="checkbox-inline">
								<input type="checkbox">1
							</label>
							<label class="checkbox-inline">
								<input type="checkbox">2
							</label>
							<label class="checkbox-inline">
								<input type="checkbox">3
							</label>
						</div>
						<div class="form-group">
							<label>Radio Buttons</label>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
								</label>
							</div>
						</div>
						<div class="form-group">
							<label>Inline Radio Buttons</label>
							<label class="radio-inline">
								<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
							</label>
							<label class="radio-inline">
								<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
							</label>
							<label class="radio-inline">
								<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
							</label>
						</div>
						<div class="form-group">
							<label>Selects</label>
							<select class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="form-group">
							<label>Multiple Selects</label>
							<select multiple class="form-control">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<button type="submit" class="btn btn-default">Submit Button</button>
						<button type="reset" class="btn btn-default">Reset Button</button>
					</form>
				</div>
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
<script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	$('#dataTables').DataTable({
		responsive: true
	});
});
</script>
@stop
