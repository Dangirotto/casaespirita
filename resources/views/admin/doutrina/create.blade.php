@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{route('admin.doutrinas.index')}}">Doutrina</a></li>
            <li class="breadcrumb-item active">Inserir</li>
        </ol>

        <!-- Conteudo da pagina -->
        <div class="row">
            <div class="col-sm-8 col-md-offset-2">
                {!! Form::open(['method'=>'post', 'action'=>'AdminDoutrinasController@store', 'files'=>true]) !!}
                    <div class="form-group">
                    {!! Form::label('titulo','Título:') !!}
                    {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('link','Link para ler online:') !!}
                    {!! Form::text('link', null, ['class'=>'form-control', 'placeholder'=>'Link para ler online']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('texto','Texto:') !!}
                    {!! Form::textarea('texto', null, ['class'=>'form-control', 'placeholder'=>'Texto']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('file','PDF:') !!}
                    {!! Form::file('file') !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Inserir', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}