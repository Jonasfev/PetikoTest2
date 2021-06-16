@extends('header')

{{-- Formulario de pedido --}}
@section('content')
    <h4>Novo Pedido</h4>
    <hr>
    <form action="{{route('addTask')}}" method="POST">
        @csrf
        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Sobrenome" name="sobrenome" id="sobrenome" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" id="pedido" name="pedido"  placeholder="Pedido" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col-3">
                <input type="text" class="form-control" id="cep" name="cep"  placeholder="CEP" maxlength="9"
                onblur="pesquisacep(this.value, false);" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Rua" name="rua"  id="rua" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Bairro" name="bairro" id="bairro" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Cidade" name="cidade" id="cidade" required>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Estado" name="estado" id="uf" required>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Numero" name="numero" id="numero" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
@endsection


    



@section('selection')
    <li class = "list-group-item "><a href="{{Route('taskList')}}">Pedidos</a></li>
    <li class = "list-group-item active"><a href="#">Novo Pedido</a></li>
@endsection

