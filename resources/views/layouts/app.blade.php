<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ecommerce</title>
    <base href="{{ asset('/') }}"/>
    <link rel="icon" href="favicon.ico"/>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-5 navbar-light bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="produtos">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="carrinho">Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="pedidos">Pedidos</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="{{route('search')}}">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
@yield('content')
<link rel="stylesheet" href="{{mix('css/app.css')}}" type="text/css">
</body>
</html>
