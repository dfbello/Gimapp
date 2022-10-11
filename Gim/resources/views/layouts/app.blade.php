<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - GimApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body class="text-center">

    <header class="border-bottom text-bg-dark py-2">
        <div class="container d-flex flex-wrap">
            <h3 class="me-auto"> GimApp</h3>

            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{route('login.create')}}" class="nav-link active" aria-current="page">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('register.index')}}" class="nav-link" aria-current="page">Registro</a>
                </li>
                <li>
                    <a href="{{route('login.destroy')}}" class="nav-link" aria-current="page">Logout</a>
                </li>
            </ul>
        </div>
        
    </header>

    @yield('content')

</body>

</html>