
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Casa Espírita</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                @if(Auth::check())
                    <a class="text-muted" href="/admin">Admin</a>
                @endif
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark fonte-merienda" href="/">Casa Espírita</a>
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

    <div class="nav-scroller py-1 mb-2 borda-nav-bar">
        <nav class="nav d-flex justify-content-between fonte-merienda">
            <a class="p-2 text-muted" href="/">Início</a>
            <a class="p-2 text-muted" href="{{route('artigos.list')}}">Artigos / Notícias</a>
            <!-- <a class="p-2 text-muted" href="#">Notícias</a> -->
            <a class="p-2 text-muted" href="#">Vídeos</a>
            <a class="p-2 text-muted" href="#">Doutrina</a>
            <a class="p-2 text-muted" href="#">Livros</a>
            <a class="p-2 text-muted" href="#">Casas / Estudos</a>
            <a class="p-2 text-muted" href="#">Atendimento Fraterno</a>
            <a class="p-2 text-muted" href="#">Contato</a>
            <!-- <a class="p-2 text-muted" href="#">Health</a>
            <a class="p-2 text-muted" href="#">Style</a>
            <a class="p-2 text-muted" href="#">Travel</a> -->
        </nav>
    </div>

    @yield('content')

    <footer class="blog-footer fonte-merienda">
        <p>Copyright Casa Espírita 2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/holder.min.js"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
</body>
</html>