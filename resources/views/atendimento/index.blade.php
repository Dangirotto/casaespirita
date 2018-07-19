@extends('layouts.home')

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            @if(Session::has('adminAtendimentoSuccessMessage'))
                <p class="alert alert-success">{{session('adminAtendimentoSuccessMessage')}}</p>
            @endif

            <h1 class="mt-4 fonte-merienda">Atendimento Fraterno</h1>
            <hr>
            <p class="lead fonte-merienda">O que é o atendimento fraterno?</p>
            <div class="row">
                <p class="col-md-8 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto asperiores autem beatae consequatur corporis cumque doloremque et expedita illo ipsum magnam maiores minima natus, nihil nostrum quam quas quibusdam quis quo repellat repellendus sed, suscipit voluptatum! A accusantium ad aperiam architecto dignissimos error eum fugit hic laudantium libero molestiae neque numquam pariatur quae qui tenetur totam, unde, vel vero voluptatibus? A dolorem est id nihil optio quae voluptate. Ad asperiores debitis distinctio dolor dolore ducimus eaque eveniet ex expedita fugit iste iusto laudantium minus neque, officia omnis quae quia quod ratione rem repellat repudiandae sit tempora tempore unde vitae voluptatum.</p>
                <img height="250" class="col-md-4 img-responsive" src="/images/Atendimento fraterno.png" alt="Atendimento fraterno">
            </div>
            <hr>

            <p class="lead fonte-merienda">Solicitar seu atendimento:</p>
            <p class="text-justify">O atendimento é totalmente anônimo, bastando inserir seu e-mail no campo abaixo para iniciar. Você receberá um e-mail com um link para continuar seu atendimento e receberá uma notificação quando houver resposta de um atendente.</p>
            {!! Form::open(['method'=>'post', 'action'=>'AtendimentoController@iniciar_atendimento']) !!}
                    <div class="form-group">
                            {!! Form::label('email','E-mail:') !!}
                            {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail']) !!}
                    </div>
                    <div class="form-group">
                            {!! Form::submit('Solicitar atendimento', ['class'=>'btn btn-primary']) !!}
                    </div>
            {!! Form::close() !!}
            <hr>

            <p class="lead fonte-merienda">Continuar seu atendimento:</p>
            <p class="text-justify">Para continuar seu atendimento, insira abaixo o código recebido por e-mail, ou clique diretamente no link recebido no mesmo.</p>
            {!! Form::open(['method'=>'post', 'action'=>'AtendimentoController@continuar_atendimento']) !!}
            <div class="form-group">
                {!! Form::label('codigo','Código:') !!}
                {!! Form::text('codigo', null, ['class'=>'form-control', 'placeholder'=>'Código']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Continuar atendimento', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            <hr>

            @include('includes.form_errors')

        </div>
        <!-- /.row -->

        @include('includes.sidebar')

    </div>
</div>
    <!-- /.container -->


@endsection
