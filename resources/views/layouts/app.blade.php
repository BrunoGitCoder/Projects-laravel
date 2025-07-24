<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Project')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @auth
        <aside>
            <ul>
                <li><a href="{{ route('projects.index') }}">Projetos</a></li>
            </ul>
            <img src="" alt="user-image">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Sair</button>
            </form>
        </aside>
    @endauth
    <main>
        @auth
            <h1>@yield('name-section', 'DefinirNome')</h1> 
        @endauth

        @yield('content')
    </main>
</body>
</html>