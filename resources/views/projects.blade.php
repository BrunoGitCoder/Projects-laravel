@extends('layouts.app')
@section('title', 'Projetos')

@section('content')
<div class="table-div">
    <div>
        <h2>Projetos</h2>
        @if ($projects->count())
            <form action="{{ route('projects.create') }}" method="GET">@csrf<button type="submit">Criar Projeto</button></form>            
        @endif
    </div>
    <table>
        <tr>
            <th>Nome</th>
        </tr>
        @forelse ($projects as $project)
            <tr>
                <td>
                    <a href="{{ route('tasks.index', $project->id) }}">
                        <div title="{{ $project->description }}">{{ $project->name }}</div>
                    </a>
                </td>
                <td>
                    <form action="{{ route('projects.edit', $project->id) }}" method="GET">
                        @csrf
                        <button class="btn-edit" type="submit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o projeto [{{ $project->name }}]?');">@csrf @method('DELETE')
                        <button class="btn-edit red" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>
                    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center">
                        <span>Comece agora e</span>
                        <form action="{{ route('projects.create') }}" method="GET">
                            @csrf
                            <button style="margin: 0 10px" class="btn-pri" type="submit">Crie</button>
                        </form>
                        <span>um novo projeto!</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </table>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection