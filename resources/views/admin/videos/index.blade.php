@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Vídeos</li>
        </ol>

        @if(Session::has('adminVideosSuccessMessage'))
            <p class="alert alert-success">{{session('adminVideosSuccessMessage')}}</p>
    @endif

    <!-- Conteudo da pagina -->
        <a href="{{route('admin.videos.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Título</th>
                <th>Link do Youtube</th>
                <th>Autor</th>
                <th>Usuário</th>
                <th>Visualizações</th>
                <th>Criado</th>
                <th>Atualizado</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
                <tr>
                    <td>{{$video->titulo}}</td>
                    <td><a href="{{$video->fonte}}">{{$video->fonte}}</a></td>
                    <td>{{$video->autor}}</td>
                    <td>{{$video->user_id}}</td>
                    <td>{{$video->views}}</td>
                    <td>{{$video->created_at->diffForHumans()}}</td>
                    <td>{{$video->updated_at->diffForHumans()}}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('admin.videos.edit', $video->id)}}">
                                <button class="btn btn-success" title="Editar vídeo">
                                    <i class="fa fa-fw fa-edit"></i>
                                </button>
                            </a>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminVideoController@destroy',$video->id]]) !!}
                            <button type="submit" class="btn btn-danger" title="Apagar Vídeo">
                                <i class="fa fa-fw fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('admin.videos.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}