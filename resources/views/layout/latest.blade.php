<div class="review-slider">

    <div class="col-md-6 news-left-grid">
        <h3>No pierdas tiempo buscando</h3>
        <h2>Mira las mejores PELICULAS ahora!</h2>
    </div>

<ul id="flexiselDemo1">

@foreach ($firstMoviesCollection as $lates)
        <li><img data-id="{{ $lates->slug }}" class="image" src="{{ asset('/resources/images/little_size_' . $lates->image_path) }}" alt=""/></li>
@endforeach


</ul>
    <script type="text/javascript">
$(window).load(function() {

  $("#flexiselDemo1").flexisel({
        visibleItems: 6,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 3000,
        pauseOnHover: false,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: {
            portrait: {
                changePoint:480,
                visibleItems: 2
            },
            landscape: {
                changePoint:640,
                visibleItems: 3
            },
            tablet: {
                changePoint:768,
                visibleItems: 4
            }
        }
    });
    });
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
</div>
