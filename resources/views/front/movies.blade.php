@extends('layout2')

@section('title')
    Peliculas
@endsection

@section('content')
    <div class="reviews-section">
        <h3 class="head">{{ 'Todas las peliculas' }}
        @if (Route::currentRouteName() == 'front.category')
        {{ ' de ' . $category->name }}
        @endif
        </h3>
            <div class="col-md-9 reviews-grids">
                @include('layout.show_movies')
            </div>
            <div class="col-md-3 side-bar">
                <h2>Categorias</h2>
                <br>
                <div class="list-group">
                @foreach ($categories as $category)
                    <a href="{{ route('front.category', strtolower(strtr(utf8_decode($category->name), utf8_decode('ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ'), 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr'))) }}" class="list-group-item">{{ $category->name }}</a>
                @endforeach
                </div>
            </div>

            <div class="clearfix"></div>
    </div>
@endsection
