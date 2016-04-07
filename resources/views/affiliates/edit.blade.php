@extends('layout')
<!--
*
* Page Specific CSS
*
-->
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ url('bower_components/morrisjs/morris.css') }}">
<style type="text/css">

</style>
@stop




<!--
*
* Content Starts Here
*
-->
@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Affiliate</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Affiliate {{ $affiliate->name }}
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="col-md-7">
					<form role="form" action="/affiliates/{{ $affiliate->id }}" method="post">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    <div class="form-group">
	                        <label>Name</label>
	                        <input class="form-control" name="name" value="{{ $affiliate->name }}">
	                    </div>
	                    <div class="form-group">
	                        <label>Url</label>
	                        <input class="form-control" name="url" value="{{ $affiliate->url }}">
	                    </div>
	                    <div class="form-group">
	                        <label>Feed</label>
	                        <input class="form-control" name="feedUrl" value="">
	                    </div>
	                    <button type="submit" class="btn btn-primary">Update Scene</button>
	                </form>
                </div>
                <div class="col-md-5">
                	<ul class="list-group">
                	@if($affiliate->feeds()->get())
                		@foreach($affiliate->feeds()->get() as $feed)
                		<li class="list-group-item"><p>{{ $feed->url }}</p></li>
                		@endforeach
                	@endif
                	</ul>
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

@stop
