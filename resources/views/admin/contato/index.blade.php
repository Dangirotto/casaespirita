@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Mensagens</li>
        </ol>

        @if(Session::has('adminMensagensSuccessMessage'))
            <p class="alert alert-success">{{session('adminMensagensSuccessMessage')}}</p>
    @endif

    <!-- Conteudo da pagina -->
        <table class="table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Mensagem</th>
                <th>Lida</th>
                <th>Respondida</th>
                <th>Enviada em</th>
                <th>Respondida em</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mensagens as $mensagem)
                <tr>
                    <td>{{$mensagem->nome}}</td>
                    <td>{{$mensagem->email}}</td>
                    <td>{{str_limit(strip_tags($mensagem->mensagem),20)}}</td>
                    <td>
                        @if($mensagem->lida == '0')
                            {{--<button class="btn btn-danger"><i class="fa fa-fw fa-times"></i></button>--}}
                            <i class="fa fa-fw fa-times" style="color: red;"></i>
                        @else
                            {{--<button class="btn btn-success"><i class="fa fa-fw fa-check"></i></button>--}}
                            <i class="fa fa-fw fa-check" style="color: green;"></i>
                        @endif
                    </td>
                    <td>
                        @if($mensagem->respondida == '0')
                            {{--<button class="btn btn-danger"><i class="fa fa-fw fa-times"></i></button>--}}
                            <i class="fa fa-fw fa-times" style="color: red;"></i>
                        @else
                            {{--<button class="btn btn-success"><i class="fa fa-fw fa-check"></i></button>--}}
                            <i class="fa fa-fw fa-check" style="color: green;"></i>
                        @endif
                    </td>
                    <td>{{$mensagem->created_at->diffForHumans()}}</td>
                    <td>
                        @if($mensagem->respondida == '0')
                            -
                        @else
                            {{$mensagem->updated_at->diffForHumans()}}
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            <a href="{{route('admin.contato.edit', $mensagem->id)}}">
                                <button class="btn btn-success" title="Ler/Responder">
                                    <i class="fa fa-fw fa-edit"></i>
                                </button>
                            </a>
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