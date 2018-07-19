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
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($atendimentos as $atendimento)
                <tr>
                    <td>{{$atendimento->user_id == 0 ? '-' : $atendimento->user->name}}</td>
                    <td>{{$atendimento->email}}</td>
                    <td>{{$atendimento->created_at}}</td>
                    <td>{{$atendimento->ativo}}</td>
                    <td>{{$atendimento->chats()->count()}}</td>
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