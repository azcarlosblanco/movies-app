<div class="header" style="background: url('{{ asset('resources/banner.jpg') }}') no-repeat center 12vh">
    <div class="top-header">
        <div class="logo">
            <a href="{{ route('front.index') }}"><img src="{{ asset('resources/logocine.png') }}" alt=""/></a>
            <p>Películas y mas</p>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            {!! Html::menu([
                'front.index'  => 'Home',
                'front.movies'    => 'Películas',
                'front.contact'  => 'Contacto',
                ]) !!}
          <ul class="nav navbar-nav navbar-right">
            @include('layout.header.login')
          </ul>
          <div class="search">
              {!! Form::open(['route' => 'front.movies', 'method' => 'GET']) !!}
                  <input type="text" name="title" value="Buscar.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar..';}"/>
                  <input type="submit" value="">
              {!! Form::close() !!}
          </div>
        </div>
        <div class="clearfix"></div>
    </div>
    @include('layout.header.header')
</div>
