@extends('templates.master')
@section('content')

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
    @foreach($productos as $p)
<h5>{{$p->precio}}</h5>
    @endforeach
    <a href="{{$p->id}}" class="btn btn-default add-to-cart"><i class="fa fa-plus"></i>Añadir Carro</a>
  </div>
</div>
@stop