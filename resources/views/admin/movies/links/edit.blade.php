@extends('layout2')

@section('title')
    Editar links
@endsection

@section('content')
  <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="row">
                      <div class="col-lg-12">
                        {!! Form::model($link, ['url' => route('admin.movies.links.update', ['movieId' => $link->movie_id, 'linkId' => $link->id]), 'method' => 'PUT', 'class' =>'form-horizontal', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('server', 'Server', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('server', null, ['class' => 'form-control', 'placeholder' => 'Coloque el server', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('audio', 'Audio', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('audio', ['español' => 'Español', 'ingles' => 'Ingles Sub'], null, ['class' => 'form-control', 'placeholder'=>'Seleccione un audio', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('quality', 'Calidad', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('quality', ['normal' => 'Normal', 'hd' => 'HD', 'full_hd' => 'Full HD'], null, ['class' => 'form-control', 'placeholder'=>'Seleccione la calidad', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Tipo', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('type', ['full' => 'Película', 'trailer' => 'Trailer'], null, ['class' => 'form-control', 'placeholder'=>'Seleccione un tipo', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('link', null, ['class' => 'form-control', 'placeholder' => 'link', 'required']) !!}
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
