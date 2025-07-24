@extends('layouts.app')

@section('title', 'Tarefas de ' . $project->name)

@section('content')
    <h2>Tarefas do Projeto: {{ $project->name }}</h2>
    <p>{{ $project->description }}</p>
    <a href="{{ route('tasks.create', $project->id) }}">Nova Tarefa</a>
    
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Prioridade</th>
                <th>Prazo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <tr title="{{ $task->description }}">
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', [$project->id, $task->id]) }}"><button type="button">Edit</button></a>
                        <form action="{{ route('tasks.destroy', [$project->id, $task->id]) }}" method="POST" style="display:inline" onsubmit="return confirm('Deletar a tarefa [{{ $task->title }}]?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Crie uma
                        <a href="{{ route('tasks.create', $project->id) }}">
                        <button type="button">Nova Tarefa</button>
                    </a>
                </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
@endsection