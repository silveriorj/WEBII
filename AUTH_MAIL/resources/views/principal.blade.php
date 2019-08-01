<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mailable - Importação de Dados ".txt"</title>

        <!-- Latest compiled and minified CSS -->

        <!-- Bootstrap URL - CSS -->
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{ url('/themes/theme.css') }}">
        <!-- Ajax Script -->
        <script src="{{ url('/js/jquery-3.3.1.slim.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>


        @yield('script')

    </head>

    <body role="document">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">SRF - Sistema de Relatório Financeiro</a>
                </div>
                <div id="navbarSupportedContent" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="{{ url('/main') }}"> Custom Email </a>
                        </li>
                        <li class="active">
                            <a href="{{ url('/socios') }}"> Socios </a>
                        </li>
                    </ul>

                    <!-- NavBar Right -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="active">
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="active">
                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li>
                                <a>{{ Auth::user()->name }}</a>
                            </li>

                            <li class="active">

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img src="img/logout_icon.png" width="18" height="18">
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

                @yield('conteudo')

            </div>

            <!-- <div class="page-header"> -->
                <b>&copy;2019
                    &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                    Raul J. S. Silverio
                    &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                    Copyright ©
                </b>
            <!-- </div> -->
    </body>
</html>
