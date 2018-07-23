@extends('layouts.home')

@section('content')

    <div class="row mb-2">
        @foreach($videos as $video)
            <div class="col-md-12">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark fonte-merienda" href="{{route('videos.show', $video->id)}}">{{$video->titulo}}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{$video->created_at->toFormattedDateString()}} por <a
                                    href="#" class="fonte-merienda">{{$video->autor}}</a></div>
                        <p class="card-text mb-auto text-justify">{{str_limit(strip_tags($video->texto),400)}}</p>
                        <a href="{{route('videos.show', $video->id)}}">Ler mais...</a>
                    </div>
                    {!! $video->link !!}
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5 custom-pagination">
            {{$videos->render()}}
        </div>
    </div>

    </div>

@endsection
