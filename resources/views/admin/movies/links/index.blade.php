@extends('layout2')

@section('title')
    Administrar links
@endsection

@section('content')

    <div class="form-group col-lg-8 col-lg-offset-2 control-label">
      <a href="{{ route('admin.movies.links.create', ['movieId' => $movieId]) }}" class="btn btn-info form-control">
        <i class="fa fa-plus fa-fw"></i>
        Crear un link
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
                                  Server
                                </th>
                                <th>
                                  Audio
                                </th>
                                <th>
                                  Calidad
                                </th>
                                <th>
                                  Tipo
                                </th>
                                <th>
                                  Acción
                                </th>
                              </thead>
                              <tbody>
                                @foreach ($links as $link)
                                  <tr>
                                    <td>{{ $link->id }}</td>
                                    <td>{{ $link->server }}</td>
                                    <td>{{ $link->audio }}</td>
                                    <td>{{ $link->quality }}</td>
                                    <td>{{ $link->type }}</td>
                                    <td>
                                      <a href="{{ route('admin.movies.links.edit', ['movieId' => $movieId, 'linkId' => $link->id]) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-square-o fa-fw"></i>
                                        Editar
                                      </a>
                                      <a href="{{ route('admin.movies.links.destroy', ['movieId' => $movieId, 'linkId' => $link->id]) }}" onclick="return confirm('¿Seguro que deseas eliminar este link?')" class="btn btn-danger">
                                        <i class="fa fa-trash fa-fw"></i>
                                        Eliminar
                                      </a>
                                    </td>

                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <div class="text-center">
                              {!! $links->render() !!}
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
