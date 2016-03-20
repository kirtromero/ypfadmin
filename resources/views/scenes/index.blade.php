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
        <h1 class="page-header">Scenes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                All scenes
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Duration</th>
                                <th>Link</th>
                                <th>Added Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scenes as $scene)
                            <tr class="odd gradeX">
                                <td><img src="{{ $scene->primary_thumbnail }}"></td>
                                <td>{{ $scene->title }}</td>
                                <td>{{ $scene->duration }}</td>
                                <td>{{ $scene->link }}</td>
                                <td>{{ $scene->created_at }}</td>
                                <td>
                                    <a href="/scenes/{{ $scene->id }}/edit" class="btn btn-xs btn-primary">Edit</a>
                                    <form action="/scene/{{ $scene->id }}" method="POST">
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
    });
</script>
@stop
