<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container w-75 p-3">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link text-white" href="/users">Usuários</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/posts">Posts</a>
                            </li>
                        </ul>
                     </div>

                    <div class="col-3">
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::user())
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">{{Auth::user()->name}}</a>
                            </li>
                            @if(Auth::user()->is_admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{route('admin')}}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form action="{{route('logout')}}" method="post">
                                    @csrf
                                    <x-responsive-nav-link class="nav-link text-white" :href="route('logout')"
                                                           onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{__('Sair')}}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('login')}}">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{route('register')}}">Cadastrar</a>
                            </li>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('body')
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
