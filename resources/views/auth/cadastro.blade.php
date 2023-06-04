@extends('layout.homeStyle')

@section('title', 'login')

@section('content')

<form action="POST">
    @csrf
    <p>Cadastro</p>
    <div>
        <label for="">Nome:</label>
        <input type="text" id='nome'>
    </div>
    <div>
        <label for="">E-mail:</label>
        <input type="text" id='email'>
    </div>
    <div>
        <label for="">Senha:</label>
        <input type="password" id='password'>
    </div>
    <div>
        <label for="">Data de Nascimento:</label>
        <input type="date" id='nascimento'>
    </div>
    <button type="submit">Cadastrar</button>
</form>
<a href="{{ url('') }}" class="fonte_cadastro">Caso ja tenha uma conta, faça o login aqui</a>

@endsection