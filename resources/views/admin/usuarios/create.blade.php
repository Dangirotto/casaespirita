@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{route('admin.usuarios.index')}}">Usuários</a></li>
            <li class="breadcrumb-item active">Inserir</li>
        </ol>

        <!-- Conteudo da pagina -->
        <div class="row">
            <div class="col-sm-8 col-md-offset-2">
                {!! Form::open(['method'=>'post', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name','Nome:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nome:']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email','E-mail:') !!}
                    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail:']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password','Senha:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('nivel','Nível:') !!}
                    {!! Form::select('nivel', ['admin' => 'Administrador', 'colab' => 'Colaborador'], null, ['placeholder' => 'Nível...','class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('skype','Skype:') !!}
                    {!! Form::text('skype', null, ['class'=>'form-control', 'placeholder'=>'Skype']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Inserir', ['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            @include('includes.form_errors')
        </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}