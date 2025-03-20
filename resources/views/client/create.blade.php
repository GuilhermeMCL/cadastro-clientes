@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cpf_cnpj">CPF ou CNPJ</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" required>
        </div>
        <!-- Adicione os campos de endereço (rua, numero, bairro, cidade, estado) aqui -->
        <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
    </form>
</div>
@endsection
