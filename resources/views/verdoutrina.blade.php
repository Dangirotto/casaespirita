@extends('layouts.home')

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8" style="padding-bottom: 20px;">

            <!-- Title -->
            <h1 class="mt-4 fonte-merienda">{{$doutrina->titulo}}</h1>

            <!-- Author -->
            <p class="lead">
                por
                <a href="#" class="fonte-merienda">Allan Kardec</a>
            </p>

            <hr>

            <!-- Date/Time -->
            {{--<p>Postado {{$artigo->created_at->diffForHumans()}}</p>--}}

            {{--<hr>--}}

            <!-- Preview Image -->
            {{--<img class="img-fluid rounded" height="300" src="http://placehold.it/300x300" alt="Imagem do post">--}}

            {{--<hr>--}}

            <!-- Post Content -->

            {!! $doutrina->texto !!}

            <hr>
            <p class="lead">Ler online: <a href="{{$doutrina->link}}" target="_blank">{{$doutrina->link}}</a></p>
            <p class="lead"><a href="{{$doutrina->pdf}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>Download PDF</a></p>



            <a href="javascript:history.back()"><button class="btn btn-primary">Voltar</button></a>

        </div>
        <!-- /.row -->

        @include('includes.sidebar')

    </div>
    <!-- /.container -->


@endsection
