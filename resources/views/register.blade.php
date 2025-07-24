@extends('layouts.app')
@section('title', 'Registrar-se')

@section('content')
    <h2>Registrar novo usuario</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div>
            <i>Nome</i>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <i>E-mail</i>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <i>Senha</i>
            <input id="password" type="password" name="password" required>
        </div>
        <div>
            <i>Confirmar Senha</i>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Registrar</button>
        </div>
    </form>
    <p>
        Já tem conta? <a href="{{ route('login') }}">Entrar</a>
    </p>
@endsection