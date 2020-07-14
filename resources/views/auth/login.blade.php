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
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style=  "background-size: 100%; background-image:url('{{ asset('img/fondooficial.png') }}');position:relative; ">
<div class="vl"></div>


<div class="vl"></div>

<div class="container" style="height: 100%;">
<br><br><br><br>  
<aside class="col-sm-1">




	</aside> 

<div class="row ">
	<aside class="col-sm-4">
<div>




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

</div> 

	</aside>
	<aside class="col-sm-3">




	</aside> 
	<aside class="col-5">
    <div class="row">
<div class="card" style="background-color: rgb(255, 251, 187,0);opacity: 80%; border-radius:5%">
<center>
<img src="img/login.png" width="60%">
</center>
<article class="card-body">
<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                        
                            <label  for="email" class="col-md-2 col-form-label text-md-right"><i class="fas fa-user"></i></i></label>
                        

                            <div class="col-md-9">
                             <input id="email" type="email" placeholder="Correo electronico" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>  
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
                                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                <button type="submit" class="btn btn-lg btn-primary">
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
                            <a>¿No estas registrado?,</a><a href="http://llevelo.com/register">Registrate aqui.</a>
                            </center>
                            
                    </form>
</article>
</div> 
	</aside> 
</div> 

</div> 


</body>
@endsection
