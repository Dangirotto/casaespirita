@extends('layouts.home')

@section('content')

    <div class="row mb-2">
        @foreach($artigos as $artigo)
            <div class="col-md-12">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark fonte-merienda" href="#">{{$artigo->titulo}}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{$artigo->created_at->toFormattedDateString()}} por <a
                                    href="#" class="fonte-merienda">{{$artigo->autor}}</a></div>
                        <p class="card-text mb-auto text-justify">{{str_limit(strip_tags($artigo->texto),400)}}</p>
                        <a href="{{route('artigos.show', $artigo->id)}}">Ler mais...</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" height="200" width="250" src="{{$artigo->imagem}}" alt="Card image cap">
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5 custom-pagination">
            {{$artigos->render()}}
        </div>
    </div>

    </div>

@endsection
