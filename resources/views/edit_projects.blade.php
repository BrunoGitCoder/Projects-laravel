@extends('layouts.app')
@section('title', 'Edit Registro')

@section('content')
<form class="form-pri" action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="flex-center" style="flex-direction: column;">
        <h2 style="font-size: 1.4rem; font-weight: bold;">Editar</h2>
        <h3 style="color: #969696;">{{ $project->name }}</h3>   
    </div>
        <div>
            <span class="fa-regular fa-newspaper"></span>
            <input type="text" name="name" value="{{ old('name', $project->name) }}" placeholder="" required>
            <i>Nome</i>
            @error('name')
                <span class='error-msg'>{{ $message }}</span>
            @enderror
        </div>
        <div style="display: flex; flex-direction: column; padding-top: 20px">
            <span>Descrição</span>
            <textarea name="description" rows="5">{{ old('description', $project->description) }}</textarea>
        </div>
        <div class='flex-center' style="gap: 10px">
            <button class="btn-line-pri" type="submit">Salvar</button>
            <a href="{{ route('projects.index') }}">
                <button class="btn-line-pri red" type="button">Cancelar</button>
            </a>    
        </div>
    </form>

@endsection