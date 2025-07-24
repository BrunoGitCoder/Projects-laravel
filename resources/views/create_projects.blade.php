@extends('layouts.app')
@section('title', 'Novo Projeto')

@section('content')
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div>
            <i>Nome</i>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <i>Descrição</i>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection