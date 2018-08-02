@extends('layouts.admin')

@section('content')
    {{--FULLCALENDAR--}}
    <link href="/css/fullcalendar.min.css" rel="stylesheet">
    {{--<link href="/css/fullcalendar.print.min.css" rel="stylesheet">--}}

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item active">Meu calendário</li>
        </ol>

        @if(Session::has('adminCalendarioSuccessMessage'))
            <p class="alert alert-success">{{session('adminCalendarioSuccessMessage')}}</p>
        @endif
        @if(Session::has('adminCalendarioFailMessage'))
            <p class="alert alert-danger">{{session('adminCalendarioFailMessage')}}</p>
        @endif

    <!-- Conteudo da pagina -->
        <a href="{{route('admin.calendario.create')}}"><button class="btn btn-primary botao_borda">Inserir</button></a>

        <h3>Seu calendário:</h3>

        {!! Form::open(['method'=>'post', 'action'=>'AdminDisponibilidadeController@store', 'files'=>true]) !!}
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        {!! Form::label('inicio','Início:') !!}
                        {!! Form::date('inicio', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        {!! Form::label('final','Final:') !!}
                        {!! Form::date('final', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-2 col-sm-2 col-md-2 text-center"> &nbsp; <br/>
                    <div class="form-group">
                        {!! Form::submit('Inserir', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

        {!! $calendar_details->calendar() !!}


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}

@section('scripts')
    <script src="/js/moment.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    {!! $calendar_details->script() !!}
@endsection {{--End of section 'scripts'--}}