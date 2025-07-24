@extends('layouts.app')
@section('title', 'Projetos')

@section('content')
    @if ($projects->count())
        <table>
            <tr>
                <th>Projeto</th>
                <th>Descrição</th>
            </tr>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <div>
            <i>Comece agora e</i><form action="{{ route('projects.create') }}" method="GET">@csrf<button type="submit">Crie</button></form><i>umNovo projeto!</i>
        </div>
    @endif
@endsection