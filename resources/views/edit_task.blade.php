@extends('layouts.app')
@section('title', 'Novo Projeto')

@section('content')

    <form action="{{ route('tasks.update', [$project->id, $task->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Título</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
        @error('title')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="description">Descrição</label>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
        @error('description')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="status">Status</label>
        <select name="status" required>
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>Em andamento</option>
            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
        @error('status')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="priority">Prioridade</label>
        <select name="priority" required>
            <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Baixa</option>
            <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Média</option>
            <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>Alta</option>
        </select>
        @error('priority')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="due_date">Data de entrega</label>
        <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
        @error('due_date')
            <div style="color:red;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Criar Tarefa</button>
</form>

@endsection