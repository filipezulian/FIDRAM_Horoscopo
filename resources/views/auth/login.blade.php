@extends('layout.homeStyle')

@section('title', 'login')

@section('content')

<form method="POST" action="{{ route('login.login') }}">
    @csrf
    <p>Login</p>
    @error('error')
    <div class="msg_erro_login_div">
        <span class="msg_erro_login">{{ $message }}</span>
    </div>
    @enderror
    <div>
        <label for="">E-mail:</label>
        <input type="text" name="email" id='email'>
    </div>
    <div>
        <label for="">Senha:</label>
        <input type="password" name="password" id='password'>
    </div>
    <button type="submit">Login</button>
</form>
<a href="{{ route('cadastro') }}" class="fonte_cadastro">Caso não tenha uma conta, faça o cadastro aqui</a>

@endsection