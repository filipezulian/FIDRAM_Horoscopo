@extends('layout.homeStyle')

@section('title', 'login')

@section('content')

<div class="login-mid-block">
    <form method="POST" action="{{route('cadastro')}}">
        @csrf
        <h1 class="nav-text-lc">Cadastro</h1>
            <div class="labels-cadastro">
                <label for="">Nome:</label>
                <label for="">E-mail:</label>
                <label for="">CPF:</label>
                <label for="">Senha:</label>
                <label for="">Data de Nascimento:</label>
            </div>
            <div class="info-cadastro">
                <input type="text" name="name" id='name'>
                <input type="text" name="email" id='email'>
                <input type="text" name="cpf" id="cpf">
                <input type="password" name="password" id='password'>
                <input type="date" name="nascimento" id='nascimento'>
            </div>
            <div class="btn-cadastro">
                <button type="submit">Cadastrar</button>
            </div>   
        </form>   
    <a href="{{ url('') }}" class="fonte_cadastro">Caso já tenha uma conta, faça o login aqui</a> 
</div>



@endsection