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
        <h1 class="page-header">Add an affiliate</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Info
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="form"
                	role="form"
					method="post"
					action="/affiliates">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label>Affiliate Name</label>
                        <input class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Affiliate url</label>
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
@stop



<!--
*
* Page Specific Javascripts
*
-->
@section('page-javascripts')

@stop
