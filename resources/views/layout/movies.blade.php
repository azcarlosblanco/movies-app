<div class="container">
    <div class="more-reviews">
         <ul id="flexiselDemo2">
         @foreach ($firstMoviesCollection as $movie)
             <li><img data-id="{{ $movie->slug }}" class="image" src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt=""/></li>
         @endforeach
        </ul>

    <script type="text/javascript">
    $(window).load(function() {

      $("#flexiselDemo2").flexisel({
            visibleItems: 8,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: false,
            enableResponsiveBreakpoints: false,
        });
        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>

    <div class="more-reviews">
         <ul id="flexiselDemo3">
         @foreach ($secondMoviesCollection as $movie)
             <li><img data-id="{{ $movie->slug }}" class="image" src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt=""/></li>
         @endforeach
        </ul>

    <script type="text/javascript">
    $(window).load(function() {

      $("#flexiselDemo3").flexisel({
            visibleItems: 8,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: false,
            enableResponsiveBreakpoints: false,
        });
        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>

    <div class="more-reviews">
         <ul id="flexiselDemo4">
         @foreach ($thirdMoviesCollection as $movie)
             <li><img data-id="{{ $movie->slug }}" class="image" src="{{ asset('/resources/images/little_size_' . $movie->image_path) }}" alt=""/></li>
         @endforeach
        </ul>

    <script type="text/javascript">
    $(window).load(function() {

      $("#flexiselDemo4").flexisel({
            visibleItems: 8,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: false,
            enableResponsiveBreakpoints: false,
        });
        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>
    <script type="text/javascript">
        $(window).load(function() {
          $("img.image").click(function() {
              var image = $(this);
              var slug = image.data('id');
              window.location.href = "{{ route('front.movies') }}" + "/" + slug;
          });
        });
    </script>
</div>
