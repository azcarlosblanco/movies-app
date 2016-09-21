@if (Session::has('alert'))
  <p class="alert alert-info col-lg-8 col-lg-offset-2">
    {{ Session::get('alert') }}
  </p>
@endif
