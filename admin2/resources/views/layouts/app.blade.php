<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" >
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        @else
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Vistas<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('listado-empresas')}}">Empresas</a>
                                        <a href="{{ route('listado-contacto')}}">Contacto</a>
                                        <a href="{{ route('listado-mas-informacion')}}">Más información</a>
                                        <a href="{{ route('listado-te-llamamos')}}">Solicitud llamada</a>
                                        <a href="{{ route('listado-curriculums')}}">Currículums</a>
                                        <a href="{{ route('listado-sorteo-becas')}}">Sorteo Becas</a>
                                        <a href="{{ route('listado-newsletter')}}">Newsletter</a>
                                        <a href="{{ route('listado-talleresyeventos')}}">Talleres y eventos</a>
                                        <a href="{{ route('listado-ofertas-trabajo')}}">Jobs</a>
                                    </li>
                                </ul>
                            </li>
                            @can('add_offers')  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Contenido web<span class="caret"></span></a>     
                                       <ul class="dropdown-menu">                   
                                    <li>
                                        <a href="{{ route('inscribir-ofertas')}}">Crear nueva oferta</a>
                                    </li>
                                    <li>
                                        <a href="#">Crear nuevo evento</a>
                                    </li>     
                                </ul>
                            </li>
                              @endcan   
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Usuarios <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('register')}}">Registrar nuevo usuario</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Ver perfil</a>
                                        <a href="https://www.codespaceacademy.com/admin2/public/password/reset/">Cambiar contraseña</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ route('logs')}}" role="button">
                                    Logs
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
        <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/forms/work_offers.js') }}"></script>
     <script src="{{ asset('plugins/fullcalendar/lib/jquery.min.js') }}"></script>
     <script src="{{ asset('plugins/fullcalendar/lib/jquery-ui.min.js') }}"></script>
     <script src="{{ asset('plugins/fullcalendar//lib/moment.min.js') }}"></script>
     <script src="{{ asset('plugins/fullcalendar/fullcalendar.js') }}"></script>
     <script src="{{ asset('plugins/fullcalendar/locale/es.js') }}"></script>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
  $(document).ready(function () {
    $('.table-container tr').on('click', function () {
      $('#' + $(this).data('display')).toggle();
    });
    $('#table-log').DataTable({
      "order": [1, 'desc'],
      "stateSave": true,
      "stateSaveCallback": function (settings, data) {
        window.localStorage.setItem("datatable", JSON.stringify(data));
      },
      "stateLoadCallback": function (settings) {
        var data = JSON.parse(window.localStorage.getItem("datatable"));
        if (data) data.start = 0;
        return data;
      }
    });
    $('#delete-log, #delete-all-log').click(function () {
      return confirm('Are you sure?');
    });
  });
</script>
     @yield('scripts')
</body>
</html>
