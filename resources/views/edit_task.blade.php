@extends('layouts.app')
@section('title', 'Editar tarefa')

@section('content')

    <form class="form-pri" action="{{ route('tasks.update', [$project->id, $task->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="flex-center" style="flex-direction: column;">
        <h2 style="font-size: 1.4rem; font-weight: bold;">Editar</h2>
        <h3 style="color: #969696;">{{ $task->title }}</h3>   
    </div>
    <div>
        <span class="fa-regular fa-newspaper"></span>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" placeholder="" required>
        <i for="title">Título</i>
        @error('title')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>

    <div style="display: flex; flex-direction: column; padding-top: 20px">
        <span for="description">Descrição</span>
        <textarea name="description" rows="5">{{ old('description', $task->description) }}</textarea>
        @error('description')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>

    <div style="display: flex; justify-content: space-between; margin-top:10px;">
        <span for="status">Status</span>
        <select name="status" required>
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pendente</option>
            <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>Em andamento</option>
            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Concluída</option>
        </select>
        @error('status')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>

    <div style="display: flex; justify-content: space-between; margin-top:10px;">
        <span for="priority">Prioridade</span>
        <select name="priority" required>
            <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Baixa</option>
            <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Média</option>
            <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>Alta</option>
        </select>
        @error('priority')
            <span class='error-msg'>{{ $message }}</span>
        @enderror
    </div>

    <div style="display: flex; flex-direction: column; margin-top: 10px; align-items: center">
        <span for="due_date">Data de entrega</span>
        <input style="margin-top: 0" type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
        @error('due_date')
            <span style="text-align: center; width: 100%; left: 0" class='error-msg'>{{ $message }}</span>
        @enderror
    </div>
     <div class='flex-center' style="gap: 10px">
        <button class="btn-line-pri" type="submit">Salvar</button>
        <a href="{{ route('tasks.index', $project->id) }}">
                <button class="btn-line-pri red" type="button">Cancelar</button>
            </a>  
    </div>
</form>

@endsection