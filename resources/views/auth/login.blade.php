@extends('layout.homeStyle')

@section('title', 'login')

@section('content')

<div class="login-mid-block">
    <form method="POST" action="{{ route('login.login') }}">
        @csrf
        <div>
            <h1>Login</h1>
        </div>

        @error('error')
        <div class="msg_erro_login_div">
            <span class="msg_erro_login">{{ $message }}</span>
        </div>
        @enderror
        
        <div class="campos-login-top">
            <label class="label-login" for="">E-mail:</label>
            <input class="input-login-email" type="text" name="email" id='email'>
        </div>
        <div class="campos-login-bottom">
            <label class="label-login" for="">Senha:</label>
            <input class="input-login-senha" type="password" name="password" id='password'>
        </div>
            <button class="btn-login" type="submit">Login</button>
        <div>
            <a href="{{ route('cadastro') }}" class="fonte_cadastro">Caso não tenha uma conta, faça o cadastro aqui</a>
        </div>
    </form>
    
</div>

<!--
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
*/
-->
@endsection