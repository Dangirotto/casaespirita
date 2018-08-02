@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>

        @if(Session::has('adminUsersSuccessMessage'))
            <p class="alert alert-success">{{session('adminUsersSuccessMessage')}}</p>
    @endif

    <!-- Conteudo da pagina -->
        <a href="{{route('admin.usuarios.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Nível</th>
                <th>Skype</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->nivel}}</td>
                    <td>{{$usuario->skype}}</td>
                    <td>
                        <div class="row">
                            @if($usuario->nivel <> 'root')
                                <a href="{{route('admin.usuarios.edit', $usuario->id)}}">
                                    <button class="btn btn-success" title="Editar usuário">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </button>
                                </a>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$usuario->id]]) !!}
                                <button type="submit" class="btn btn-danger" title="Apagar Usuário">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('admin.usuarios.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}