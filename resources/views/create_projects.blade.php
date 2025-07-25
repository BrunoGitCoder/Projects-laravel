@extends('layouts.app')
@section('title', 'Novo Projeto')

@section('content')
<form class="form-pri" action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="flex-center">
        <h2 style="font-size: 1.4rem; font-weight: bold;">Novo projeto</h2>
    </div>
        <div>
            <span class="fa-regular fa-newspaper"></span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="" required>
            <i>Nome</i>
            @error('name')
                <span class='error-msg'>{{ $message }}</span>
            @enderror
        </div>
        <div style="display: flex; flex-direction: column; padding-top: 20px">
            <span>Descrição</span>
            <textarea name="description" rows="5">{{ old('description') }}</textarea>
        </div>
        <div class='flex-center' style="gap: 10px">
            <button class='btn-line-pri' type="submit">Criar</button>
            <a href="{{ route('projects.index') }}">
                <button class='btn-line-pri red' type="button">Cancelar</button>
            </a>
        </div>
    </form>
@endsection