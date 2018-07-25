@extends('layouts.home')

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            @if(Session::has('contatoSuccessMessage'))
                <p class="alert alert-success">{{session('contatoSuccessMessage')}}</p>
            @endif

            <h1 class="mt-4 fonte-merienda">Fale conosco</h1>
            <hr>
                <p class="text-justify">Use este espaço para entrar em contato conosco. Qualquer opinião, sugestão ou crítica será lida, considerada e respondida.</p>

            {!! Form::open(['method'=>'post', 'action'=>'ContatoController@enviaContato']) !!}
                <div class="form-group">
                    {!! Form::label('nome','Nome:') !!}
                    {!! Form::text('nome', null, ['class'=>'form-control', 'placeholder'=>'Nome']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('email','E-mail:') !!}
                        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('mensagem','Mensagem:') !!}
                        {!! Form::textarea('mensagem', null, ['class'=>'form-control', 'placeholder'=>'Escreva sua mensagem...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Enviar mensagem', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            <hr>

            @include('includes.form_errors')

        </div>
        <!-- /.row -->

        @include('includes.sidebar')

    </div>
    </div>
    <!-- /.container -->


@endsection
