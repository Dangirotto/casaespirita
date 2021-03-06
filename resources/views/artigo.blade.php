@extends('layouts.home')

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="padding-bottom: 20px;">

            <!-- Title -->
            <h1 class="mt-4 fonte-merienda">{{$artigo->titulo}}</h1>

            <!-- Author -->
            <p class="lead">
                por
                <a href="#" class="fonte-merienda">{{$artigo->autor}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Postado {{$artigo->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" height="300" src="{{$artigo->imagem}}" alt="Imagem do post">

            <hr>

            <!-- Post Content -->

            {!! $artigo->texto !!}

            <hr>
            <p class="lead">Fonte: <a href="{{$artigo->fonte}}" target="_blank">{{$artigo->fonte}}</a></p>

            <a href="javascript:history.back()"><button class="btn btn-primary">Voltar</button></a>

    </div>
    <!-- /.row -->

        @include('includes.sidebar')

</div>
<!-- /.container -->


@endsection
