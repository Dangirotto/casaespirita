@extends('layouts.home')

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

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

            <hr>
            <p class="lead fonte-merienda">Solicitar seu atendimento:</p>
            <p class="text-justify">O atendimento é totalmente anônimo, bastando inserir seu e-mail no campo abaixo para iniciar. Você também receberá um e-mail com um link para continuar seu atendimento futuramente.</p>
            {!! Form::open(['method'=>'post', 'action'=>'AtendimentoController@iniciar_atendimento']) !!}
                    <div class="form-group">
                            {!! Form::label('email','E-mail:') !!}
                            {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail']) !!}
                    </div>
                    <div class="form-group">
                            {!! Form::submit('Solicitar atendimento', ['class'=>'btn btn-primary']) !!}
                    </div>
            {!! Form::close() !!}
            <hr>

            <p class="lead fonte-merienda">Continuar seu atendimento:</p>
            <p class="text-justify">Para continuar seu atendimento, insira abaixo o código recebido por e-mail, ou clique diretamente no link recebido no mesmo.</p>
            {!! Form::open(['method'=>'post', 'action'=>'AtendimentoController@continuar_atendimento']) !!}
            <div class="form-group">
                {!! Form::label('codigo','Código:') !!}
                {!! Form::text('codigo', null, ['class'=>'form-control', 'placeholder'=>'Código']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Continuar atendimento', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            <hr>

                <script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
                <div id="SkypeButton_Call_dangirotto_1">
                    <script type="text/javascript">
                        Skype.ui({
                            "name": "call",
                            "element": "SkypeButton_Call_dangirotto_1",
                            "participants": ["dangirotto"],
                            "imageSize": 24
                        });
                    </script>
                </div>

            @include('includes.form_errors')

        </div>
        <!-- /.row -->

        @include('includes.sidebar')

    </div>
</div>
    <!-- /.container -->


@endsection
