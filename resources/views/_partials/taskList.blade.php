@extends('header')


@section('content')
    <h4>Pedidos</h4>
    <hr>
@endsection


@section('selection')
    <li class = "list-group-item active"><a href="#">Pedidos</a></li>
    <li class = "list-group-item "><a href="{{Route('newTask')}}">Novo Pedido</a></li>
@endsection

