@extends('layouts.app')
@section('title', 'Edit Registro')

@section('content')
<h1>editar reg</h1>
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