@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">



<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>

<body style=  "background-size: 100%; background-image:url('{{ asset('img/fondo.png') }}');position:relative; ">
<div class="vl"></div>
<br><br><br>
<div class="vl" style=" border-left: 2px solid white;height: 450px; position: absolute;  left: 50%;" ></div>

<div class="vl"></div>

<div class="container" style="height: 100px;">
<br><br><br><br>  
<aside class="col-sm-1">




	</aside> 

<div class="row ">
	<aside class="col-sm-4">
<div class="card">
<article class="card-body">
<a>Los coronavirus son una extensa familia de virus que pueden causar enfermedades tanto en animales como en humanos. En los humanos, se sabe que varios coronavirus causan infecciones respiratorias que pueden ir desde el resfriado común hasta enfermedades más graves como el síndrome respiratorio de Oriente Medio (MERS) y el síndrome respiratorio agudo severo (SRAS). El coronavirus que se ha descubierto más recientemente causa la enfermedad por coronavirus COVID-19.</a>


	 <form>
    <div class="form-group">
    
    </div> 
    <div class="form-group">
    	
    </div> 
    <div class="form-group"> 
    <div class="checkbox">
    
    </div> 
    </div> 
                                                         
</form>
</article>
</div> 

	</aside>
	<aside class="col-sm-3">




	</aside> 
	<aside class="col-3">
    <div class="row">
<div class="card">
<center>
<img src="img/logo.png" width="40%" height="40%"></img>
</center>
<article class="card-body">
<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                        
                            <label  for="email" class="col-md-2 col-form-label text-md-right"><i class="fas fa-user"></i></i></label>
                        

                            <div class="col-md-9">
                             <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right"><i class="fas fa-key"></i></label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                               
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 ">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Ingresar') }}
                                </button>

                                {{--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif--}}
                            </div>
                            
                        </div>
                        <br><br>
                            <center>
                            <a>¿No estas registrado?, Registrate aqui.</a>
                            </center>
                            
                    </form>
</article>
</div> 
	</aside> 
</div> 

</div> 


</body>
@endsection
