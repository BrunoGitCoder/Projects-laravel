@extends('layouts.app')
@section('title', 'Login')

@section('content')

<div style="height: 250px; display: flex; justify-content: center; align-items: center;">
    <img id="logo" src="{{ asset('images/logo_blue.svg') }}" alt="Logo">
</div>

<form class="form-pri" action="{{ route('login') }}" method="POST">
    @csrf
    <h2>Entrar</h2>
    <div>
        <span class="fa-regular fa-envelope"></span>
        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="" required>
        <i>E-mail</i>
    </div>
    <div>
        <span class="fa-solid fa-key"></span>
        <input id="password" type="password" name="password" placeholder="" required>
        <i>Senha</i>
    </div>
    <div class="flex-center">
        <button class="btn-line-pri" type="submit">Entrar</button>
        @error('auth')
            <span style="left: 50%; transform: translateX(-50%); width: 100%; text-align: center; bottom: -1.5rem;" class='error-msg'>{{ $message }}</span>
        @enderror
    </div>
</form>

<p>
    Não tem uma conta? <a href="{{ route('register') }}">Crie uma conta agora</a>   
</p>
@endsection