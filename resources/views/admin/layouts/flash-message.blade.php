@if ($message = Session::get('success'))
<div class="alert alert-fill-success" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-fill-danger" role="alert">
  <i class="mdi mdi-alert-circle"></i>
  {{ $message }}
</div>
@endif