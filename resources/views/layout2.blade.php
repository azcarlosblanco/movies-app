<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="peliculas, peliculas gratis, ver peliculas" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- header-section-starts -->
	<div class="full">
		<div class="main">
    		<div class="contact-content">
                <nav class="navbar navbar-default top-header span_top">
                    <div class="logo">
                        <a href="{{ route('front.index') }}"><img src="/resources/logocine.png" alt=""/></a>
                        <p>Películas y mas</p>
                    </div>
            		<div class="container-fluid">
            			<div class="navbar-header">
            				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            					<span class="sr-only">Toggle Navigation</span>
            					<span class="icon-bar"></span>
            					<span class="icon-bar"></span>
            					<span class="icon-bar"></span>
            				</button>
            			</div>

            			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            				<ul class="nav navbar-nav navbar-left">
                                {!! Html::menu([
                                    'front.index'  => 'Home',
                                    'front.movies'    => 'Películas',
                                    'front.contact'  => 'Contacto',
                                    ]) !!}
            				</ul>
                            <div class="search navbar-form navbar-left">
                                {!! Form::open(['route' => 'front.movies', 'method' => 'GET']) !!}
                                    <input type="text" name="title" value="Buscar.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Buscar..';}"/>
                                    <input type="submit" value="">
                                {!! Form::close() !!}
                            </div>
            				<ul class="nav navbar-nav navbar-right">
                                @include('layout.header.login')
            				</ul>
                            <div class="clearfix"></div>
            			</div>
            		</div>
            	</nav>
    			<!---contact-->
                <div class="content">
                    @include('partials.errors')
                    @include('partials.alert')
                    @yield('content')
                </div>
                @include('layout.footer')
    	    </div>
	    </div>
    </div>
	<div class="clearfix"></div>
	</div>
</body>
</html>
