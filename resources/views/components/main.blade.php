<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body>

        <header>
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse">

                    <ul class="navbar-nav d-flex justify-content-center">
                        <li class="nav-item px-2">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="/cadastrarpaciente" class="nav-link">Cadastrar Paciente</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="/cadastrarmedico" class="nav-link">Cadastrar Médico</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="/cadastrarespecialidade" class="nav-link">Cadastrar Especilidade</a>
                        </li>
                        <li class="nav-item px-2">
                            <a href="/marcarconsulta" class="nav-link">Marcar Consulta</a>
                        </li>
                    </ul>

                </div>
            </div>
        </header>

        <div class="col-12 d-flex justify-content-center">

            @yield('content')

        </div>



    </body>
</html>
