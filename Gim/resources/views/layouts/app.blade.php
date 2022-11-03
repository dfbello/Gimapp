<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - GimApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="">

    <header class="border-bottom text-bg-dark py-2">
        <div class="container d-flex flex-wrap">
            <h3 class="me-auto"> GimApp</h3>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link" aria-current="page">Inicio</a>
                </li>
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

</body>

</html>