@extends('layouts.home')

<link rel="stylesheet" href="/css/chat.css">

@section('content')

    <div class="row">
        <div class="col-md-12 frame" style="background-color: #e0e0de;">
            <ul>
                @foreach($atendimento->chats()->orderBy('created_at')->get() as $chat)

                    @if($chat->postado_por == 'guest')
                        <li style="width:100%">
                            <div class="msj-rta macro">
                                <div class="text text-r">
                                    <p>{{$chat->mensagem}}</p>
                                    <p><small>{{$chat->created_at->diffForHumans()}}</small></p>
                                </div>
                            </div>
                        </li>
                    @else
                        <li style="width:100%">
                            <div class="msj macro">
                                <div class="text text-l">
                                    <p>{{$chat->mensagem}}</p>
                                    <p><small>{{$chat->created_at->diffForHumans()}}</small></p>
                                </div>
                            </div>
                        </li>
                    @endif

                @endforeach
            </ul>
            <div class="msj-rta macro">
                <div class="text text-r" style="background:whitesmoke !important">
                    <input class="mytext" placeholder="Type a message"/>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
