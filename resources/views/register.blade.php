@extends('layouts.app')
@section('title', 'Registrar-se')

@section('content')
<div style="height: 150px; display: flex; justify-content: center; align-items: center;">
    <img id="logo" src="{{ asset('images/logo_blue.svg') }}" alt="Logo">
</div>
<form class="form-pri" action="{{ route('register') }}" method="POST">
    @csrf
    <h2>Novo usuario</h2>
    <div>
        <span class="fa-regular fa-user"></span>
        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="" required>
        <i>Nome</i>
        @error('name')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <span class="fa-regular fa-envelope"></span>
        <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="" required>
        <i>E-mail</i>
        @error('email')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <span class="fa-solid fa-key"></span>
        <input id="password" type="password" name="password" placeholder="" required>
        <i>Senha</i>
        @error('password')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <span class="fa-solid fa-key" style="color: #fff"></span>
        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="" required>
        <i>Confirmar Senha</i>
    </div>
    <div class="flex-center">
        <button class="btn-line-pri" type="submit">Registrar</button>
    </div>
</form>
<p>
    Já tem conta? <a href="{{ route('login') }}">Entrar</a>
</p>
@endsection