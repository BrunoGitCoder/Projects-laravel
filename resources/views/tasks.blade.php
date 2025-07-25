@extends('layouts.app')

@section('title', 'Tarefas de ' . $project->name)

@section('content')
<div class="table-div" style="margin-top: -150px">
    <div class="table-title" style="align-items: flex-end;">
        <div>
            <a href="{{ route('projects.index') }}"><button class="btn-line-pri" type="button">Voltar</button></a>
            <h2>Tarefas | {{ $project->name }}</h2>
            <p style="padding-left: 140px; color: #969696;">{{ $project->description }}</p>
        </div>
        @if ($tasks->count())
            <a href="{{ route('tasks.create', $project->id) }}"><button class="btn-pri" style="min-width: 150px;" type="button">Nova Tarefa</button></a>
        @endif
    </div>
    <table class="task-table">
        @if ($tasks->count())
        <thead>
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Prioridade</th>
                <th>Prazo</th>
            </tr>
        </thead>
        @endif
        <tbody>
            @forelse ($tasks as $task)
                <tr title="{{ $task->description }}">
                    <td>{{ $task->title }}</td>
                    <td><p class="label {{ $task->status }}">{{ $task->status_name }}</p></td>
                    <td><p class="label {{ $task->priority }}">{{ $task->priority_name }}</p></td>
                    <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</td>
                    <td class="actions">
                        <a href="{{ route('tasks.edit', [$project->id, $task->id]) }}">
                            <button class="btn-edit" type="button">Edit</button>
                        </a>
                        <form action="{{ route('tasks.destroy', [$project->id, $task->id]) }}" method="POST" style="display:inline" onsubmit="return confirm('Deletar a tarefa [{{ $task->title }}]?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-edit red" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="new-td">
                        <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
                            Crie uma
                            <a href="{{ route('tasks.create', $project->id) }}">
                                <button style="margin: 0 10px" class="btn-pri" type="button">Nova</button>                
                            </a>
                            tarefa.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
</div>
@endsection