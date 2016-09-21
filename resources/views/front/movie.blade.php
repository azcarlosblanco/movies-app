@extends('layout2')

@section('title')
    Peliculas
@endsection

@section('content')
    <div class="reviews-section">
            <div class="col-md-9 reviews-grids">
                <div class="review">
                    <div class="movie-pic">
                        <a href=""><img src="{{ asset('/resources/images/medium_size_' . $movie->image_path) }}" alt="" /></a>
                    </div>
                    <div class="review-info">
                        <a class="span" href="">{{ $movie->title }}</a>
                        <p class="dirctr">{{ $movie->resume }}</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="review">
                    <div class="video">
                        @if (\Gate::forUser($user)->denies('see-movie', $movie))
                            <div class="notify">
                                <h3>Este Contenido esta disponible solo para usuarios premium</h3>
                            </div>
                        @else
                            @if ($link == null && $showMovie = $movie->links
                                ->filter(function ($link) {
                                    return $link->type == 'full';
                                })->first())
                            <iframe  src="{{ $showMovie->link }}" frameborder="0" allowfullscreen></iframe>
                            @elseif($showMovie = $movie->links
                                ->where('id', $link)->reject(function($link) {
                                    return $link->type == 'trailer';
                                })->first())
                            <iframe  src="{{ $showMovie->link }}" frameborder="0" allowfullscreen></iframe>
                            @endif
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="review">
                    <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>
                                  #
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
                                  Acción
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($movie->links
                                        ->filter(function ($link) {
                                            return $link->type == 'full';
                                        }) as $link)
                            <tr>
                                <td>
                                    {{ $link->id }}
                                </td>
                                <td>
                                    {{ $link->server }}
                                </td>
                                <td>
                                    {{ $link->audio }}
                                </td>
                                <td>
                                    {{ $link->quality }}
                                </td>
                                <td>
                                    <a href="{{ route('front.movie', [
                                        'slug' => $movie->slug,
                                        'link' => $link->id
                                        ]) }}" class="btn btn-default btn-red">Ver</a>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-3 side-bar">
                <div class="entertainment">
                    <div class="video">
                        @if ($trailer = $movie->links
                                          ->filter(function ($link) {
                                              return $link->type == 'trailer';
                                          })->first())
                            <h3>Trailer</h3>
                            <iframe  src="{{ $trailer->link }}" class="resize" frameborder="0" allowfullscreen></iframe>
                        @endif
                    </div>
                </div>
                <div class="entertainment">
                    <h3>Peliculas relacionadas</h3>
                    @foreach ($relatedMovies as $movie)
                        <ul>
                            <li class="ent">
                                <a href="{{ route('front.movie', $movie->slug) }}"><img src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt="" /></a>
                            </li>
                            <li>
                                <a href="{{ route('front.movie', $movie->slug) }}">{{ $movie->title }}</a>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    @endforeach
                </div>

            </div>

            <div class="clearfix"></div>
    </div>
@endsection
