<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - GimApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="">

    <div class="row" style="display: flex;">

        <div class="col-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark mr-0" style="height:100vh;">
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="/" class="nav-link active" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg> GimApp
                </a>
              </li>
              <li>
                <a href="/recursos" class="nav-link text-white">
                  Recursos
                </a>
              </li>
              <li>
                <a href="/ejercicio" class="nav-link text-white">
                  Ejercicios
                </a>
              </li>
              <li>
                <a href="/rutinas" class="nav-link text-white">
                  Rutinas
                </a>
              </li>
              <li>
                <a href="/group_class" class="nav-link text-white">
                  Clases
                </a>
              </li>
            </ul>
        </div>

        <div class="col-10 p-0">

            <header class="border-bottom text-bg-dark py-2">
                <div class="container d-flex flex-row-reverse">
                    <ul class="nav nav-pills">
                        @guest
                            <li class="nav-item">
                                <a href="{{route('login.create')}}" class="nav-link active" aria-current="page">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('register.index')}}" class="nav-link" aria-current="page">Registro</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('login.index')}}" class="nav-link" aria-current="page">Perfil</a>
                            </li>
                            <li>
                                <a href="{{route('login.destroy')}}" class="nav-link" aria-current="page">Logout</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </header>

            @yield('content') 
        </div>
    </div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>