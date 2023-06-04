@extends('layout.homeStyle')

@section('title', 'login')

@section('content')

    <form action="POST">
        @csrf
        <p>Login</p>
        <div>
            <label for="">E-mail:</label>
            <input type="text" id='email'>
        </div>
        <div>
            <label for="">Senha:</label>
            <input type="password" id='password'>
        </div>
        <button type="submit">Login</button>
    </form>
    <a href="{{ url('cadastro') }}" class="fonte_cadastro">Caso não tenha uma conta, faça o cadastro aqui</a>

@endsection
