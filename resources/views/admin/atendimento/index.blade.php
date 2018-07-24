@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Artigos/Notícias</li>
        </ol>

        @if(Session::has('adminAtendimentoSuccessMessage'))
            <p class="alert alert-success">{{session('adminAtendimentoSuccessMessage')}}</p>
        @endif

        <!-- Conteudo da pagina -->
        {{--<a href="{{route('admin.artigos.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>--}}

        <table class="table">
            <thead>
            <tr>
                <th>Atendente</th>
                <th>E-mail</th>
                <th>Criado</th>
                <th>Status</th>
                <th>Número de mensagens</th>
                <th>Não lidas</th>
                <th>Última mensagem</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($atendimentos as $atendimento)
                <tr>
                    <td>
                        @if($atendimento->user_id == 0)
                            {!! Form::model($atendimento, ['method'=>'POST', 'action'=>['AdminAtendimentoController@assumir', $atendimento->id]]) !!}
                                    <button type="submit" class="btn btn-success">Assumir atendimento</button>
                            {!! Form::close() !!}
                        @else
                            @if($atendimento->user_id == $user->id)
                                <a href="{{route('admin.atendimento.atender', $atendimento->id)}}">
                                    <button class="btn btn-success">Atender</button></a>
                            @else
                                {{$atendimento->user->name}}
                            @endif
                        @endif
                        {{--{{$atendimento->user_id == 0 ? '-' : $atendimento->user->name}}--}}
                    </td>
                    <td>{{$atendimento->email}}</td>
                    <td>{{$atendimento->created_at->diffForHumans()}}</td>
                    <td>
                        @if($atendimento->ativo == 1)
                            Ativo
                        @else
                            Inativo
                        @endif
                    </td>
                    <td>{{$atendimento->chats()->count()}}</td>
                    <td>{{$atendimento->numeroNaoLidas()}}</td>
                    <td>{{$atendimento->ultimaMensagem()->diffForHumans()}}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('admin.artigos.edit', $atendimento->id)}}">
                                <button class="btn btn-success" title="Editar artigo">
                                    <i class="fa fa-fw fa-edit"></i>
                                </button>
                            </a>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminArticlesController@destroy',$atendimento->id]]) !!}
                            <button type="submit" class="btn btn-danger" title="Apagar Artigo">
                                <i class="fa fa-fw fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('admin.artigos.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}