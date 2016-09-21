<div class="contenedor">
    <style media="screen">
        div.galery {
            font-size: 0;
        }

        a.galery-item {
            font-size: 16px;
            display: inline-block;
            margin-bottom: 8px;
            width: calc(50% - 4px);
            margin-right: 8px;
        }

        a.galery-item:nth-of-type(2n) {
            margin-right: 0;
        }

        a.galery-item figure img {
            width: 90%;
        }

        @media screen and (min-width: 50em) {
            a.galery-item {
                width: calc(12% - 6px);
            }

            a.galery-item:nth-of-type(2n) {
                margin-right: 8px;
            }

            a.galery-item:nth-of-type(4n) {
                margin-right: 0;
            }
        }
    </style>
    <div class="galery">

        <div class="more-reviews">
        @foreach ($firstMoviesCollection as $movie)
            <a class="galery-item" href="{{ route('front.movie', $movie->slug) }}">
              <figure>
                <img src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt=""/>
              </figure>
            </a>
        @endforeach
        </div>
        <div class="more-reviews">
        @foreach ($secondMoviesCollection as $movie)
            <a class="galery-item" href="{{ route('front.movie', $movie->slug) }}">
              <figure>
                <img src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt=""/>
              </figure>
            </a>
        @endforeach
        </div>
        <div class="more-reviews">
        @foreach ($thirdMoviesCollection as $movie)
            <a class="galery-item" href="{{ route('front.movie', $movie->slug) }}">
              <figure>
                <img src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt=""/>
              </figure>
            </a>
        @endforeach
        </div>
    </div>
    <div class="text-center">
        {!! $movies->render() !!}
    </div>
</div>
