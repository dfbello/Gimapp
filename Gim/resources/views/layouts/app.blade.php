<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - GimApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="">

    <div class="row" style="display: flex;">

        @guest
            <div class="col p-0">
        @else
        <div class="position-fixed top-0 start-0 d-flex flex-column flex-shrink-0 p-3 text-white text-bg-dark mr-0" style="height:100vh; width:15%;">
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="/" class="nav-link active" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> GimApp
                </a>
              </li>
              @can('recurso.index')
              <li>
                <a href="/recursos" class="nav-link text-white" id="btn-menu-lateral">
                  Recursos
                </a>
              </li>
              @endcan
              @can('ejercicio.index')
              <li>
                <a href="/ejercicio" class="nav-link text-white" id="btn-menu-lateral">
                  Ejercicios
                </a>
              </li>
              @endcan

              @can('rutina.index')
              <li>
                <a href="/rutinas" class="nav-link text-white" id="btn-menu-lateral">
                  Rutinas
                </a>
              </li>
              @endcan

              @can('entrenador.index')
              <li>
                <a href="/entrenador" class="nav-link text-white" id="btn-menu-lateral">
                  Entrenadores
                </a>
              </li>
              @endcan

              <!--<li>
                <a href="/entrenamiento" class="nav-link text-white" id="btn-menu-lateral">
                  Entrenamientos
                </a>
              </li>-->
              @can('cliente.index')
              <li>
                <a href="/cliente" class="nav-link text-white" id="btn-menu-lateral">
                  Clientes
                </a>
              </li>
              @endcan
              <li>
                <a href="/group_class" class="nav-link text-white" id="btn-menu-lateral">
                  Clases
                </a>
              </li>
              <!--<li>
                <a href="/anuncios" class="nav-link text-white" id="btn-menu-lateral">
                  Anuncios
                </a>
              </li>-->
              <li>
                <a href="/cantusuarios" class="nav-link text-white" id="btn-menu-lateral">
                  Cantidad Usuarios
                </a>
              </li>
              <li>
                <a href="{{route('register.index')}}" class="nav-link text-white" id="btn-menu-lateral">
                  Registrar usuario
                </a>
              </li>
            </ul>
        </div>

        <div class="p-0" style="width:85%; margin-left:15%;">
        @endguest
            <header class="border-bottom text-bg-dark py-2">
                <div class="container d-flex flex-row-reverse">
                    <ul class="nav nav-pills">
                        @guest
                            <li class="nav-item">
                                <a href="/" class="nav-link text-light" aria-current="page" style="font-size: 16px">GimApp</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('login.create')}}" class="nav-link text-light" aria-current="page" style="font-size: 16px">Login</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('login.index')}}" class="nav-link" aria-current="page" id="btn-perfil">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('login.destroy')}}" class="nav-link" aria-current="page" id="exit">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                  </svg>
                                </a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </header>
            <div class="w-100 h-100 bg-light" >
              @yield('content') 
            </div>
            
      </div>
    </div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>