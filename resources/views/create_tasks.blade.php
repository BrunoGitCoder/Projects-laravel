@extends('layouts.app')
@section('title', 'Criar tarefa')
@section('name_section', 'Nova tarefa')

@section('content')
    <form action="{{ route('tasks.store', $project->id) }}" method="POST">
    @csrf

    <div>
        <label for="title">Título</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">Descrição</label>
        <textarea name="description">{{ old('description') }}</textarea>
        @error('description')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="status">Status</label>
        <select name="status" required>
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>Em andamento</option>
            <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
        @error('status')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="priority">Prioridade</label>
        <select name="priority" required>
            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Baixa</option>
            <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Média</option>
            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>Alta</option>
        </select>
        @error('priority')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="due_date">Data de entrega</label>
        <input type="date" name="due_date" value="{{ old('due_date') }}">
        @error('due_date')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Criar Tarefa</button>
</form>

@endsection