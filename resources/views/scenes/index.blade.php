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
    $(function () {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
            });
        });


    $(document).ready(function() {
        $('#dataTables').DataTable({
            responsive: true,
            ajax: '/scenes/all',
            source: 'data',
            processing: true,
            serverSide: true,
            columns: [
                { data: 'thumbnail', "orderable": false  },
                { data: 'title'},
                { data: 'duration' },
                { data: 'link', "orderable": false  },
                { data: 'date' },
                { data: 'html' }
            ]
        });

        $('#dataTables').on('click','.delete-btn', function(){
            var id = $(this).data('id');
            $.ajax({
                url: '/scenes/' + id,
                type: 'POST',
                context: $(this).parent().parent(),
                data: { _method:"DELETE" },
                success: function( msg ) {
                    $(this).css("background-color","red")
                    $(this).slideUp("slow");
                }
            });
        });
    });
</script>
@stop
