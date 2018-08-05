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

        <h3>Adicionar horário disponível:</h3>

        {!! Form::open(['method'=>'post', 'action'=>'AdminDisponibilidadeController@store', 'files'=>true]) !!}
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        {!! Form::label('inicio','Início:') !!}
                        {!! Form::date('inicio', \Carbon\Carbon::now('America/Sao_Paulo'), ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        {!! Form::label('hora','Hora:') !!}
                        {!! Form::time('hora', \Carbon\Carbon::now('America/Sao_Paulo')->format('H:i'), ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-2 col-sm-2 col-md-2"> &nbsp; <br/>
                    <div class="form-group">
                        {!! Form::submit('Inserir', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

        <div class="row">
            <div class="col-md-8">
                {!! $calendar_details->calendar() !!}
            </div>
            <div class="col-md-4">
                @if(isset($evento))
                    <div class="card">
                        <h5 class="card-header">Detalhes do agendamento</h5>
                        <div class="card-body">
                                <h5 class="card-title">Data e Hora</h5>
                                {!! Form::model($evento, ['method'=>'PATCH', 'action'=>['AdminDisponibilidadeController@update', $evento->id], 'files'=>true]) !!}
                                <p class="card-text"></p>
                                <div class="form-group">
                                    {!! Form::label('inicio','Início:') !!}
                                    {!! Form::date('inicio', \Carbon\Carbon::parse($evento->inicio)->toDateString(), ['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('hora','Hora:') !!}
                                    {!! Form::time('hora', \Carbon\Carbon::parse($evento->inicio)->toTimeString(), ['class'=>'form-control']) !!}
                                </div>
                                {!! Form::submit('Atualizar', ['class'=>'btn btn-primary']) !!}
                                {!! Form::close() !!}
                                <hr>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminDisponibilidadeController@destroy',$evento->id]]) !!}
                                {!! Form::submit('Excluir', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>



    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

@endsection {{--End of section 'content'--}}

@section('scripts')
    <script>

        $(document).ready(function(){

            function click_test(){
                alert("test");
            }

            $('#calendar').fullCalendar({
                eventClick: function(calEvent, jsEvent, view) {

                    alert('Event: ' + calEvent.title);
                    alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                    alert('View: ' + view.name);

                    // change the border color just for fun
                    $(this).css('border-color', 'red');

                }
            });


        });

    </script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/locale/pt-br.js"></script>
    {!! $calendar_details->script() !!}
@endsection {{--End of section 'scripts'--}}