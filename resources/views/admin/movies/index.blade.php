@extends('layout2')

@section('title')
    Administrar categorías
@endsection

@section('content')

    <div class="form-group col-lg-8 col-lg-offset-2 control-label">
      <a href="{{ route('admin.movies.create') }}" class="btn btn-info form-control">
        <i class="fa fa-plus fa-fw"></i>
        Agregar Película
      </a>
    </div>

    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <th>
                                  ID
                                </th>
                                <th>
                                  Titulo
                                </th>
                                <th>
                                  Categoría
                                </th>
                                <th>
                                  Visibilidad
                                </th>
                                <th>
                                  Portada
                                </th>
                                <th>
                                  Adm. Links
                                </th>
                                <th>
                                  Acción
                                </th>
                              </thead>
                              <tbody>
                                @foreach ($movies as $movie)
                                  <tr>
                                    <td>{{ $movie->id }}</td>
                                    <td>{{ $movie->title }}</td>
                                    <td>{{ $movie->category->name }}</td>
                                    <td>{{ $movie->visibility }}</td>
                                    <td>
                                        <img src="{{ '/resources/images/little_size_' . $movie->image_path }}" class="img-responsive" alt="Responsive image" style="width:40%;height:50%" />
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.movies.links.index', $movie->id) }}" class="btn btn-info">
                                          Links
                                        </a>
                                    </td>
                                    <td>
                                      <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-square-o fa-fw"></i>
                                        Editar
                                      </a>
                                      <a href="{{ route('admin.movies.destroy', $movie->id) }}" onclick="return confirm('¿Seguro que deseas eliminar esta película?')" class="btn btn-danger">
                                        <i class="fa fa-trash fa-fw"></i>
                                        Eliminar
                                      </a>
                                    </td>

                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <div class="text-center">
                              {!! $movies->render() !!}
                            </div>
                          </div>
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
