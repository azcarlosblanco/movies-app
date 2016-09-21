<div class="news">
    <div class="col-md-6 news-right-grid">
        <div class="news-grid">
            <h5>Categorias</h5>
            <br>
            <div class="list-group">
            @foreach ($categories as $category)
                <a href="#" class="list-group-item">{{ $category->name }}</a>
            @endforeach
            </div>
        </div>
        <a class="more" href="{{ route('front.movies') }}">Ver mas</a>
    </div>
    <div class="col-md-6 news-left-grid">
        <h3>Para Ver películas EXCLUSIVAS</h3>
        <h2>Solo tienes que registrarte!</h2>
        <h4>Facil, sencillo y rapido.</h4>
        <a href="#"><i class="book"></i>Registrate</a>
        <p>Alguna duda? <strong>email@email.com</strong> comunicate con nosotros!</p>
    </div>
    <div class="clearfix"></div>
</div>
