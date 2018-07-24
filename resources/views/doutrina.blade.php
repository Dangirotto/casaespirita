@extends('layouts.home')

@section('content')

    <style>
        .artigo_doutrina_fundo {
            /* background-image: url("../Fundo.jpg"); */
            background: linear-gradient(
                    to left,
                    rgba(0,0,0, 0),
                    rgba(0,0,0, 100)
            ),url("../images/Doutrina.jpg");
            /*),url("../images/Fundo.jpg");*/
            background-size: cover;
            background-position: center center;
        }
    </style>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark artigo_doutrina_fundo">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic fonte-merienda">
                {{--<a href="#" style="text-decoration: none;color: #fff;">Doutrina Espírita</a>--}}
                <p style="text-decoration: none;color: #fff;">Doutrina Espírita</p>
            </h1>
            <p class="lead my-3 text-justify">A doutrina espírita nos traz ensinamentos e esclarecimentos a respeito das lições do Cristo. Encontrei aqui os livros básicos da doutrina espírita, por Allan Kardec.</p>
            {{--<p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Leia mais...</a></p>--}}
        </div>
    </div>

    <div class="row mb-2">
    @foreach($doutrinas as $doutrina)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark fonte-merienda" href="{{route('doutrina.show', $doutrina->id)}}">{{$doutrina->titulo}}</a>
                    </h3>
                    <p class="card-text mb-auto text-justify">{{str_limit(strip_tags($doutrina->texto),300)}}</p>
                    <a href="{{route('doutrina.show', $doutrina->id)}}">Ler mais...</a>
                </div>
                {{--<img class="card-img-right flex-auto d-none d-md-block" height="200" width="250" src="" alt="Card image cap">--}}
            </div>
        </div>
        @endforeach
    </div>

    </div>

@endsection
