<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Project')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
    @auth
        <aside>
            <div class="hiden-box">
                <img id="logo" class="hiden" src="{{ asset('images/logo.svg') }}" alt="Logo">
            </div>
            <div class="hiden">
                <ul>
                    <li><a href="{{ route('projects.index') }}"><button class="btn-menu" type="button">Projetos</button></a></li>
                </ul>
            </div>
            <div>
                <img id="user-icon" src="{{ asset('images/user_icon.png') }}" alt="Logo">
                <p style="color: white; font-weight: 700" class="flex-center">{{ Auth::user()->name }}</p>
                <form class="hiden flex-center" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btb-log" type="submit">Logout</button>
                </form>
            </div>
        </aside>
    @endauth
    <main>
        @yield('content')
    </main>
<script src="https://kit.fontawesome.com/51e24a6df1.js" crossorigin="anonymous"></script>
</body>
</html>