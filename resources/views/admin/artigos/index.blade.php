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

        @if(Session::has('adminArticlesSuccessMessage'))
            <p class="alert alert-success">{{session('adminArticlesSuccessMessage')}}</p>
        @endif

     <!-- Conteudo da pagina -->
        <a href="{{route('admin.artigos.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

        <table class="table">
            <thead>
            <tr>
                <th>Título</th>
                <th>Imagem</th>
                <th>Autor</th>
                <th>Usuário</th>
                <th>Visualizações</th>
                <th>Criado</th>
                <th>Atualizado</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                @foreach($artigos as $artigo)
                    <tr>
                        <td>{{$artigo->titulo}}</td>
                        <td>
                            <img height="50" class="rounded" src="{{$artigo->imagem ?? $artigo->photoPlaceholder()}}" alt="Imagem do Artigo">
                        </td>
                        <td>{{$artigo->autor}}</td>
                        <td>{{$artigo->user_id}}</td>
                        <td>{{$artigo->views}}</td>
                        <td>{{$artigo->created_at->diffForHumans()}}</td>
                        <td>{{$artigo->updated_at->diffForHumans()}}</td>
                        <td>
                            <div class="row">
                                <a href="{{route('admin.artigos.edit', $artigo->id)}}">
                                    <button class="btn btn-success" title="Editar artigo">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </button>
                                </a>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminArticlesController@destroy',$artigo->id]]) !!}
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