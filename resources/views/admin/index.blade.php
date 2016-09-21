@extends('layout2')

@section('title')
    Panel de Administración
@endsection

@section('content')
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-8 col-md-offset-2">
    			<div class="panel panel-default center-box">
    				{{--  --}}
    				<div class="panel-body center-box">
    					@include('partials.errors')
    					@include('partials.alert')
                        <div class="form-group col-sm-12 control-label pull-right">
                          <a href="{{ route('admin.users.index')}}" class="btn btn-info form-control">
                            Administrar Usuarios
                          </a>
                        </div>
                        <div class="form-group col-sm-12 control-label pull-right">
                          <a href="{{ route('admin.categories.index')}}" class="btn btn-info form-control">
                            Administrar Categorias
                          </a>
                        </div>
                        <div class="form-group col-sm-12 control-label pull-right">
                          <a href="{{ route('admin.movies.index')}}" class="btn btn-info form-control">
                            Administrar Peliculas
                          </a>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection
