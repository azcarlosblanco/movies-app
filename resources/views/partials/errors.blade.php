@if (count($errors) > 0)
  <div class="alert alert-danger col-lg-8 col-lg-offset-2">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Oops!</strong> Hubo un problema, corrige los errores debajo:<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
