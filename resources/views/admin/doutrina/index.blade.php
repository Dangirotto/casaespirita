@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Doutrinas</li>
        </ol>

        @if(Session::has('adminDoutrinasSuccessMessage'))
            <p class="alert alert-success">{{session('adminDoutrinasSuccessMessage')}}</p>
    @endif

    <!-- Conteudo da pagina -->
        <a href="{{route('admin.doutrinas.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

        <table class="table">
            <thead>
            <tr>
                <th>Título</th>
                <th>Link</th>
                <th>PDF</th>
                <th>Texto</th>
                <th>Visualizações</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doutrinas as $doutrina)
                <tr>
                    <td>{{$doutrina->titulo}}</td>
                    <td><a href="{{$doutrina->link}}" target="_blank">{{$doutrina->link}}</a></td>
                    <td>
                        <a href="{{$doutrina->pdf}}" target="_blank">
                            <i class="fa fa-fw fa-file-pdf-o"></i>
                        </a>
                    </td>
                    <td>{{str_limit(strip_tags($doutrina->texto),20)}}</td>
                    <td>{{$doutrina->views}}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('admin.doutrinas.edit', $doutrina->id)}}">
                                <button class="btn btn-success" title="Editar">
                                    <i class="fa fa-fw fa-edit"></i>
                                </button>
                            </a>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminDoutrinasController@destroy',$doutrina->id]]) !!}
                            <button type="submit" class="btn btn-danger" title="Apagar">
                                <i class="fa fa-fw fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('admin.doutrinas.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}