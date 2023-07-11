<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('logo.png')}}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body style="background-color:rgb(17,24, 39)">
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark shadow-sm">
            <div class="container">
                <a class="text-light navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('nav.png')}}" alt="" width="32">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="text-light nav-item">
                            <a class="text-light nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="text-light nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="text-light nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        @if (Auth::check())

                        @if(Auth::user()->rol == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('pacientes.index') }}" class="text-light nav-link">Pacientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('medicamentos.index') }}" class="text-light nav-link">Medicamentos</a>
                        </li>
                        <li class=" nav-item">
                            <a href="{{ route('especialidads.index') }}" class="text-light nav-link">Especialidades</a>
                        </li>
                        <li class=" nav-item">
                            <a href="{{ route('users.index') }}" class="text-light nav-link">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('medicos.index') }}" class="text-light nav-link">Medicos</a>
                        </li>
                        @else

                        @endif
                        @if(Auth::user()->rol == 'medico')
                        <li class="nav-item">
                            <a href="{{ route('pacientes.index') }}" class="text-light nav-link">Pacientes</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('medicos.index') }}" class="text-light nav-link">Medicos</a>
                        </li>
                        @else

                        @endif
                        @if(Auth::user()->rol == 'consulta')
                        <li class="nav-item">
                            <a href="{{ route('pacientes.index') }}" class="text-light nav-link">Pacientes</a>
                        </li>
                        @else

                        @endif
                                  @endif
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 bg-dark" style="bottom: 0%; height:120px; width:100%;">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="text-muted">© Ransel Encarnación, 2023-IPISA</span>
    </div>
  </footer>
</html>
