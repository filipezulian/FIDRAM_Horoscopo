@extends('layout.homeStyle')

@section('title', 'login')

@section('content')

<form method="POST" action="{{route('cadastro')}}">
    @csrf
    <p>Cadastro</p>
    <div>
        <label for="">Nome:</label>
        <input type="text" name="name" id='name'>
    </div>
    <div>
        <label for="">E-mail:</label>
        <input type="text" name="email" id='email'>
    </div>
    <div>
        <label for="">CPF:</label>
        <input type="text" name="cpf" id="cpf">
    </div>
    <div>
        <label for="">Senha:</label>
        <input type="password" name="password" id='password'>
    </div>
    <div>
        <label for="">Data de Nascimento:</label>
        <input type="date" name="nascimento" id='nascimento'>
    </div>
    <button type="submit">Cadastrar</button>
</form>
<a href="{{ url('') }}" class="fonte_cadastro">Caso ja tenha uma conta, faça o login aqui</a>

@endsection