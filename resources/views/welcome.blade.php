@extends('layouts.home')

@section('content')
    <style>
        .artigo_index_fundo {
            /* background-image: url("../Fundo.jpg"); */
            background: linear-gradient(
                    to left,
                    rgba(0,0,0, 0),
                    rgba(0,0,0, 100)
            ),url("{{$artigo_principal->imagem}}");
            /*),url("../images/Fundo.jpg");*/
            background-size: cover;
            background-position: center center;
        }
    </style>
    <!-- ATENÇÃO PARA UM POST PRINCIPAL -->
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark artigo_index_fundo">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic fonte-merienda">
                <a href="{{route('artigos.show', $artigo_principal->id)}}" style="text-decoration: none;color: #fff;">{{$artigo_principal->titulo}}</a>
            </h1>
            <p class="lead my-3 text-justify">{{str_limit(strip_tags($artigo_principal->texto),100)}}</p>
            <p class="lead mb-0"><a href="{{route('artigos.show', $artigo_principal->id)}}" class="text-white font-weight-bold">Leia mais...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        @foreach($artigos as $artigo)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark fonte-merienda" href="{{route('artigos.show', $artigo->id)}}">{{$artigo->titulo}}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{$artigo->created_at->toFormattedDateString()}}</div>
                    <p class="card-text mb-auto text-justify">{{str_limit(strip_tags($artigo->texto),50)}}</p>
                    <a href="{{route('artigos.show', $artigo->id)}}">Ler mais...</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" height="200" width="250" src="{{$artigo->imagem}}" alt="Card image cap">
            </div>
        </div>
        @endforeach
    </div>
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom fonte-merienda">
                    Último post
                </h3>

                <div class="blog-post">
                    <h2 class="blog-post-title fonte-merienda">{{$artigo_ultimo->titulo}}</h2>
                    <p class="blog-post-meta">{{$artigo_ultimo->created_at->toFormattedDateString()}} por <a href="#" class="fonte-merienda">{{$artigo_ultimo->autor}}</a></p>

                    {!! $artigo_ultimo->texto !!}

                </div><!-- /.blog-post -->

                {{--<nav class="blog-pagination">--}}
                    {{--<a class="btn btn-outline-primary" href="#">Older</a>--}}
                    {{--<a class="btn btn-outline-secondary disabled" href="#">Newer</a>--}}
                {{--</nav>--}}

            </div><!-- /.blog-main -->

            @include('includes.sidebar')

        </div><!-- /.row -->

    </main><!-- /.container -->

@endsection
