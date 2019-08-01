<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SGT - Sistema de Gestão de Trabalhos</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Bootstrap URL - CSS -->
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <!-- Custom styles for this template -->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('script')

    </head>

    <body role="document">
    <br><br><br><br>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{ route('home') }}" class="navbar-brand">SGT - Sistema de Gestão de Trabalhos</a>
                </div>
                <div id="navbarSupportedContent" class="navbar-collapse collapse">

                    <!-- NavBar Right -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="active">

                                <a href="{{ route('login') }}"><img src="/img/person_icon.png" width="18" height="18">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="active">
                                    <a  href="{{ route('register') }}"><img src="/img/registro_ico.png" width="15" height="15"> {{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a>{{ Auth::user()->name}}</a>
                            </li>
                            <li class="active">
                                <a href="{{ url('/edit') }}">
                                <img src="/img/user_edit.png" width="18" height="18">
                                        Editar
                                </a>
                            </li>
                            <li class="active">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img src="/img/logout_icon.png" width="18" height="18">
                                        {{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <div class="page-header">
                    <h1 class="form-signin-heading">
                        @yield('cabecalho')
                    </h1>
                </div>
                @yield('content')
            </div>
	 <center>    
            <!-- <div class="page-header"> -->
                <b>&copy;2019
                    &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                    Raul J. S. Silverio
                    &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                    Copyright ©
                </b>
            <!-- </div> -->
            </center>
            <br>

    </body>
</html>
