@extends('layouts.app')
@section('title', 'Projetos')

@section('name_section', 'Projetos')

@section('content')
    <form action="{{ route('projects.create') }}" method="GET">@csrf<button type="submit">Criar Projeto</button></form>
    <table>
        <tr>
            <th>Nome</th>
        </tr>
        @forelse ($projects as $project)
            <tr>
                <td><a href="{{ route('tasks.index', $project->id) }}"><div style="background: red; width: 150px">{{ $project->name }}</div></a></td>
                <td><form action="{{ route('projects.edit', $project->id) }}" method="GET">@csrf<button type="submit">Edit</button></form></td>
                <td><form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar o projeto [{{ $project->name }}]?');">@csrf @method('DELETE')<button type="submit">Delete</button></form></td>
            </tr>
        @empty
            <tr>
                <td>
                    <div>
                        <i>Comece agora e</i>
                        <form action="{{ route('projects.create') }}" method="GET">
                            @csrf
                            <button type="submit">Crie</button>
                        </form>
                        <i>umNovo projeto!</i>
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

@endsection