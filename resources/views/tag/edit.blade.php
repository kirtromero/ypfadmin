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
				Edit {{ $tag->name }}
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<form role="form" action="/tags/{{ $tag->id }}" method="post">
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="{{ $tag->name }}">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input class="form-control" name="slug" value="{{ $tag->slug }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio"  name="active" id="active1" value="1" @if($tag->active == 1) checked @endif>Active
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="active" id="active2" value="0" @if($tag->active == 0) checked @endif>Not Active
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sort</label>
                        <input class="form-control" name="sort" value="{{ $tag->sort }}">
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input class="form-control" name="thumbnail_id" value="{{ $tag->thumbnail_id }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Tag</button>
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

@stop
