@extends('layout')
<!--
*
* Page Specific CSS
*
-->
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ url('bower_components/morrisjs/morris.css') }}">
<style type="text/css">
.thumbnail {
	margin-bottom: 20px;
}
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
		<h1 class="page-header">Scene</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Scene {{ $scene->title }}
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<form role="form" action="/scenes/{{ $scene->id }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value="{{ $scene->title }}">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" value="{{ $scene->link }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" name="rating" value="{{ $scene->rating }}">
                    </div>
                    <div class="form-group">
                        <label>Duration</label>
                        <input class="form-control" name="duration" value="{{ $scene->duration }}">
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <img src="{{ $scene->primary_thumbnail }}" class="img-responsive thumbnail">
                        <input class="form-control" name="primary_thumbnail" value="{{ $scene->primary_thumbnail }}">
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <input class="form-control" name="tags" value="@foreach($scene->tag()->get() as $tag){{ $tag->name }} @endforeach">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Scene</button>
                </form>
                <div class="row">
                	@if($scene->thumbnail)
                		@foreach($scene->thumbnail as $thumbnail)
                		<img src="{{ $thumbnail->url }}">
                		@endforeach
                	@endif
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
