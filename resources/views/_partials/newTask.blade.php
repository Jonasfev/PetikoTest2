@extends('header')


@section('content')
    <h4>Novo Pedido</h4>
    <hr>
    <!--Enviando para o banco de dados -->
    <form action="tarefa_controller.php?acao=inserir" method="POST">
        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Nome" id="nome" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Sobrenome" id="sobrenome" required>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="col-3">
                <input type="text" class="form-control" id="cep" placeholder="CEP" maxlength="9"
                onblur="pesquisacep(this.value);" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Rua" id="rua" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Bairro" id="bairro" required>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Cidade" id="cidade" required>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Estado" id="uf" required>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Numero" id="numero" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
@endsection


    



@section('selection')
    <li class = "list-group-item "><a href="{{Route('taskList')}}">Pedidos</a></li>
    <li class = "list-group-item active"><a href="#">Novo Pedido</a></li>
@endsection

