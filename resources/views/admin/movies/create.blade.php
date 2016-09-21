@extends('layout2')

@section('title')
    Crear Película
@endsection

@section('content')

  <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        {!! Form::open(['route' => 'admin.movies.store', 'method' => 'POST', 'class' =>'form-horizontal', 'files' => true]) !!}
                          <div class="form-group">
                              {!! Form::label('title', 'Título', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo de la película', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('resume', 'Resumen', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::textarea('resume', null, ['class' => 'form-control', 'placeholder' => 'Resumen', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('category_id', 'Categoría', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'Seleccione una categoría', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('visibility', 'Visibilidad', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::select('visibility', ['member' => 'Todos', 'premium' => 'Premium'], null, ['class' => 'form-control', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group">
                              {!! Form::label('image', 'Portada', ['class' => 'col-sm-2 control-label']) !!}
                              <div class="col-sm-10">
                                  {!! Form::file('image_path', ['class' => 'form-control', 'required']) !!}
                              </div>
                          </div>
                          <div class="form-group col-sm-3 control-label pull-right">
                              {!! Form::submit('Registrar', ['class' => 'btn btn-info form-control']) !!}
                          </div>
                        {!! Form::close() !!}
                      </div>
                      <!-- /.col-lg-12 (nested) -->
                  </div>
                  <!-- /.row (nested) -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->


@endsection
