@extends('layouts.home')

@section('content')

    <style>
        .artigo_doutrina_fundo {
            /* background-image: url("../Fundo.jpg"); */
            background: linear-gradient(
                    to left,
                    rgba(0,0,0, 0),
                    rgba(0,0,0, 100)
            ),url("../images/Atendimento1.jpg");
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
            <p class="lead my-3 text-justify">O atendimento fraterno alivia as dores da alma e o peso do coração, é a representação sublime da humanidade se dando as mãos e ajudando uns aos outros, por amor ao próximo. Aguarde...</p>
            {{--<p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Leia mais...</a></p>--}}
        </div>
    </div>

    <div class="col-md-12">

        @if(Session::has('adminAtendimentoSuccessMessage'))
            <p class="alert alert-success">{{session('adminAtendimentoSuccessMessage')}}</p>
        @endif

        <h1 class="mt-4 fonte-merienda">Atendimento Fraterno</h1>
        <hr>
        <p class="lead fonte-merienda">O que é o atendimento fraterno?</p>
        <div class="row">
            <p class="col-md-8 text-justify">O atendimento fraterno é um trabalho estruturado para receber, em primeira mão, pessoas necessidades de ajuda que procuram a Doutrina Espírita, invariavelmente, como último recursos para seus males.<br>Há muitos casos, em que as pessoas procuram soluções para os seus familiares, pessoais, profissionais, enfim, conflitos diversos do dia a dia.<br>Muitas vezes céticas ou que nunca ouviram falar da Doutrina Espírita ou do Evangelho, essas pessoas precisam de estímulos para permaneceram firmes na decisão de encontrar respostas para suas perguntas.<br>E o atendimento fraterno desempenha esse papel de recepção, acolhimento e esclarecimento básico de amparo, reajuste e de redirecionamento de ideias.<br>Trata-se de atividade que deve ser feita com serenidade, disciplina e prepara, ou seja, com bom conhecimento doutrinário, e por isso nossos atendentes são selecionados entre pessoas com grande conhecimento da doutrina e experiência em atender pessoas em busca de ajuda.</p>
            <img height="250" class="col-md-4 img-responsive" src="/images/Atendimento fraterno.png" alt="Atendimento fraterno">
        </div>
        <p class="small">Fonte: <a href="https://radioboanova.com.br/evangelho_e_reforma/qual-importancia-atendimento-fraterno-na-casa-espirita/" target="_blank">Site Rádio Boa Nova</a> (adaptado)</p>


    </div>

    </div>

@endsection
