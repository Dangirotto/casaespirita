@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{route('admin.contato.index')}}">Mensagens</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>

        <!-- Conteudo da pagina -->
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <p class="lead"><u><strong>De: </strong></u>{{$mensagem->nome}}</p>
                <p class="lead"><u><strong>E-mail: </strong></u>{{$mensagem->email}}</p>
                <p class="lead"><u><strong>Mensagem: </strong></u>{{$mensagem->mensagem}}</p>
                <p class="lead"><u><strong>Resposta: </strong></u></p>
                {!! Form::model($mensagem, ['method'=>'PATCH', 'action'=>['AdminContatoController@update', $mensagem->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::textarea('resposta', null, ['class'=>'form-control', 'placeholder'=>'Resposta...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Responder', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}