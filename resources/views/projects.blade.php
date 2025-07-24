@extends('layouts.app')
@section('title', 'Projetos')

@section('content')
    <form action="{{ route('projects.create') }}" method="GET">@csrf<button type="submit">Criar Projeto</button></form>
    @if ($projects->count())
        <table>
            <tr>
                <th>Nome</th>
            </tr>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td><form action="{{ route('projects.edit', $project->id) }}" method="GET"><button type="submit">Edit</button></form></td>
                    <td><button>Delete</button></td>
                </tr>
            @endforeach
        </table>
    @else
        <div>
            <i>Comece agora e</i><form action="{{ route('projects.create') }}" method="GET">@csrf<button type="submit">Crie</button></form><i>umNovo projeto!</i>
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

@endsection