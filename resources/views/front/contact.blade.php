@extends('layout2')

@section('title')
    Contacto
@endsection

@section('content')
    <div class="main-contact">
    		 <h3 class="head">Comunicate con nosotros</h3>
    		 {{-- <p>WE'RE ALWAYS HERE TO HELP YOU</p> --}}
    		 <div class="contact-form">
            {!! Form::open(['route' => 'front.contact', 'method' => 'POST']) !!}
                 <div class="col-md-6 contact-left">
                     <input name="fullname" type="text" placeholder="Nombre" required/>
                     <input name="email" type="text" placeholder="Correo" required/>
                     <input name="phone" type="text" placeholder="Telefono" required/>
                 </div>
                 <div class="col-md-6 contact-right">
                     <textarea placeholder="Mensaje"></textarea>
                     <input name="message" type="submit" value="Enviar"/>
                 </div>
                 <div class="clearfix"></div>
            {!! Form::close() !!}
	        </div>
    </div>
@endsection
