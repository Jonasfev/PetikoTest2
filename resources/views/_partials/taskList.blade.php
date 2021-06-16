@extends('header')

{{-- exibição dos pedidos realizados --}}
@section('content')
    <h4>Pedidos</h4>
    <hr>
    <div id="accordion">

      @foreach ($pedidos as $pedido)
      <div class="card">
        
        <div class="card-header" id="pedido{{$pedido->id}}">
          
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$pedido->id}}" aria-expanded="false" aria-controls="collapse{{$pedido->id}}">
              Pedido #{{$pedido->id}}
            </button>
            
          </h5>
          
        </div>
    
        <div id="collapse{{$pedido->id}}" class="collapse" aria-labelledby="pedido{{$pedido->id}}" data-parent="#accordion">
          <div class="card-body">
              <div class="alert alert-dark">
                  <p>{{$pedido->nome}} {{$pedido->sobrenome}}</p>
                  <p>Pedido: {{$pedido->pedido}}</p>
                  <p>Rua: {{$pedido->rua}} </p>
                  <p>Numero: {{$pedido->numero}}</p>
                  <p>Cep: {{$pedido->cep}}</p>
                  <p>Bairro: {{$pedido->bairro}}</p>
                  <p>Cidade: {{$pedido->cidade}} </p>
                  <p>Estado: {{$pedido->estado}}</p>
              </div>
          </div>
        </div>
      </div>
          
      @endforeach 
@endsection


@section('selection')
    <li class = "list-group-item active"><a href="#">Pedidos</a></li>
    <li class = "list-group-item "><a href="{{Route('newTask')}}">Novo Pedido</a></li>
@endsection

