@extends('layouts.app')
@section('title', 'Login')

@section('content')

<h2>Entrar no sistema</h2>

<form action="{{ route('login') }}" method="POST">
    @csrf
    @error('auth')
        <i>{{ $message }}</i>
    @enderror
    <div>
        <i>E-mail</i>
        <input style="@error('auth') border: 1px solid red; @else border: 1px solid black; @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <i>Senha</i>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <button type="submit">Entrar</button>
    </div>
</form>

<p>
    Não tem uma conta? <a href="{{ route('register') }}">Crie uma conta agora!</a>
</p>

@endsection