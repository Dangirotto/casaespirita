@extends('layouts.home')

@section('content')

    <style>
        .artigo_doutrina_fundo {
            /* background-image: url("../Fundo.jpg"); */
            background: linear-gradient(
                    to left,
                    rgba(0,0,0, 0),
                    rgba(0,0,0, 100)
            ),url("../images/Construcao.jpg");
            /*),url("../images/Fundo.jpg");*/
            background-size: cover;
            background-position: center center;
        }
    </style>

    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark artigo_doutrina_fundo">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic fonte-merienda">
                {{--<a href="#" style="text-decoration: none;color: #fff;">Doutrina Espírita</a>--}}
                <p style="text-decoration: none;color: #fff;">Em construção...</p>
            </h1>
            <p class="lead my-3 text-justify">Neste seção reuniremos informações sobre casas espíritas e seus grupos de estudos, assim como grupos de estudos online. Aguarde...</p>
            {{--<p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Leia mais...</a></p>--}}
        </div>
    </div>

    </div>

@endsection
