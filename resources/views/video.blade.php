@extends('layouts.home')

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="padding-bottom: 20px;">

            <!-- Title -->
            <h1 class="mt-4 fonte-merienda">{{$video->titulo}}</h1>

            <!-- Author -->
            <p class="lead">
                por
                <a href="#" class="fonte-merienda">{{$video->autor}}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Postado {{$video->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Preview Image -->
            {{--<img class="img-fluid rounded" height="300" src="{{$artigo->imagem}}" alt="Imagem do post">--}}
            {!! str_replace('height="248"','height="440"', str_replace('width="854"','width="730"',$video->link)) !!}
            <hr>

            <!-- Post Content -->

            {!! $video->texto !!}

            <hr>
            <p class="lead">Fonte: <a href="{{$video->fonte}}" target="_blank">{{$video->fonte}}</a></p>

            <a href="javascript:history.back()"><button class="btn btn-primary">Voltar</button></a>

        </div>
        <!-- /.row -->

        @include('includes.sidebar')

    </div>
    <!-- /.container -->


@endsection
