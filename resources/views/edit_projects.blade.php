@extends('layouts.app')
@section('title', 'Edit Registro')
@section('name_section', 'Editar Projeto - ' . $project->name)

@section('content')
<p>Descrição: {{ $project->description }}</p>
 <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <i>Nome</i>
            <input type="text" name="name" value="{{ old('name', $project->name) }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <i>Descrição</i>
            <textarea name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        <button type="submit">Criar</button>
    </form>
@endsection