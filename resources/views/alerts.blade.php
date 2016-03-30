@if( Session::has('reply') )
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <strong>Success!</strong> {{ Session::get('reply') }}
  </div>
@endif

{{-- Display Error Messages --}}
@if( Session::has('errors') )
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <strong>Error!</strong>
    {{ Session::get('errors') }}
  </div>
@endif
