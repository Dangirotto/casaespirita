
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Portal Espírita</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
    <link href="/css/navbar.css" rel="stylesheet">
    {{-- Ícones para a página --}}
    <link rel="icon" href="../images/Portal.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../images/Portal.ico" type="image/x-icon" />

    <!-- OG Graph-->
    <meta property="og:locale" content="pt_br">
    <meta property="og:url" content="http://portaespirita.org">
    <meta property="og:title" content="Portal Espírita">
    <meta property="og:site_name" content="Portal Espírita">
    <meta property="og:description" content="Portal sobre a Doutrina Espírita, com informações e serviços para os interessados em aprender mais sobre o espiritismo">
    <meta property="og:image" content="http://portalespirita.org/images/PortalEspirita.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1024">
    <meta property="og:image:height" content="576">
    <meta property="og:type" content="website">

</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-2 col-sm-4 pt-1">
                @if(Auth::check())
                    <a class="text-muted" href="/admin">Admin</a>
                @endif
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark fonte-merienda" href="/">Portal Espírita</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <!-- <a class="text-muted" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                </a> -->
                @if(Auth::check())
                    <a class="btn btn-sm btn-outline-secondary" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                @else
                    <a class="btn btn-sm btn-outline-secondary" href="/admin">Login</a>
                @endif

            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fonte-merienda">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('artigos.list')}}">Artigos/Notícias</a>
                </li>
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('videos.list')}}">Vídeos</a>
                </li>
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('doutrina')}}">Doutrina</a>
                </li>
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('livros')}}">Livros</a>
                </li>
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('casas')}}">Casas/Estudos</a>
                </li>
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('atendimento.index')}}">Atendimento Fraterno</a>
                </li>
                <li class="nav-item item-menu-superior">
                    <a class="nav-link" href="{{route('contato')}}">Contato</a>
                </li>
            </ul>
            {{--<form class="form-inline col-2">--}}
                {{--<input class="form-control col-9" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-success col-3" type="submit">O</button>--}}
            {{--</form>--}}
        </div>
    </nav>


    {{--<div class="nav-scroller py-1 mb-2 borda-nav-bar">--}}
        {{--<nav class="nav d-flex justify-content-between fonte-merienda">--}}
            {{--<a class="p-2 text-muted" href="/">Início</a>--}}
            {{--<a class="p-2 text-muted" href="{{route('artigos.list')}}">Artigos / Notícias</a>--}}
            {{--<!-- <a class="p-2 text-muted" href="#">Notícias</a> -->--}}
            {{--<a class="p-2 text-muted" href="{{route('videos.list')}}">Vídeos</a>--}}
            {{--<a class="p-2 text-muted" href="{{route('doutrina')}}">Doutrina</a>--}}
            {{--<a class="p-2 text-muted" href="{{route('livros')}}">Livros</a>--}}
            {{--<a class="p-2 text-muted" href="{{route('casas')}}">Casas / Estudos</a>--}}
            {{--<a class="p-2 text-muted" href="{{route('atendimento.index')}}">Atendimento Fraterno</a>--}}
            {{--<a class="p-2 text-muted" href="{{route('contato')}}">Contato</a>--}}
        {{--</nav>--}}
    {{--</div>--}}

    @yield('content')

    <footer class="blog-footer fonte-merienda">
        <p>Copyright Portal Espírita 2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/holder.min.js"></script>
    {{--<script src="/js/chat.js"></script>--}}
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
    @yield('scripts')
</body>
</html>