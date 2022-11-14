<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CosechaSoft') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="/cosechasoft/images/favicon.png">
    <link rel="shortcut icon" sizes="192x192" href="/cosechasoft/images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- ({@vite(['resourcse/js/app.js'])}) --}}
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <style>
        .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(/cosechasoft/images/logo_footer.png) 50% 50% no-repeat #D66129;
    background-size: 3%;
}
    </style>
</head>
<body>
    <div id="carga" class="loader"></div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/cosechasoft/images/logo-new-cosechas.png" alt="" width="150">
                    {{-- {{ config('app.name', 'CosechaSoft') }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth

                    <ul class="navbar-nav me-auto ml-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('DashBoard') }}</a>
                        </li>
                        @can('crear-orden-compra')
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('ordenCompra.create') }}">{{ __('Orden Compra') }}</a>
                          </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{__("Maestros")}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            @can('ver-productos')

                                <a class="dropdown-item"  href="{{ url('/productos') }}">
                                    {{ __('Productos') }} 
                                </a>
                            @endcan
                            @can('ver-proveedores')
                                <a class="dropdown-item" href="{{ url('/proveedores') }}">
                                    {{ __('Proveedores') }}
                                </a>
                            @endcan
                            @can('ver-bodegas')
                                <a class="dropdown-item" href="{{ url('/bodegas') }}">
                                    {{ __('Bodegas') }}
                                </a>
                           @endcan
                           @can('ver-usuarios')
                                <a class="dropdown-item" href="{{ url('/usuarios') }}">
                                    {{ __('Usuarios') }}
                                </a>
                           @endcan

                            @can('ver-roles')

                                <a class="dropdown-item" href="{{ url('/roles') }}">
                                    {{ __('Perfiles') }}
                                </a>
                           @endcan

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/documentos')}}">{{ __('Documentos') }}</a>
                        </li>
                    </ul>

                    @endauth
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown mt-2">
                        <div style="container-profile">
                            <div class="profile"></div>

                            {{-- <span class="fa fa-user"></span> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <br>
                            @if (!empty(Auth::user()->getRoleNames()))
                            @foreach (Auth::user()->getRoleNames() as $rolName)
                            <i>{{$rolName}}</i>
                            @endforeach             
                            @endif 
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>

                </div>
            </div>
        </nav>

        <main class="py-4 conatin_principal">
            @yield('content')
        </main>
    </div>

</body>

<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">&copy; 2022 Mad Engineers, All rights reserved.</p>
  
      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img id="logo-mad" src="/cosechasoft/images/mad-en.png" width="120" alt="">
      </a>
  
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">DashBoard</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Ayuda</a></li>
      </ul>
    </footer>
  </div>




</html>
