@extends('layouts.home')

<link rel="stylesheet" href="/css/chat.css">

@section('content')

    {{--<div class="row">--}}
        {{--<div class="col-sm-3 col-sm-offset-4 frame">--}}
            {{--<ul></ul>--}}
            {{--<div>--}}
                {{--<div class="msj-rta macro">--}}
                    {{--<div class="text text-r" style="background:whitesmoke !important">--}}
                        {{--<input class="mytext" placeholder="Type a message"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div style="padding:10px;">--}}
                    {{--<span class="glyphicon glyphicon-share-alt"></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-12 frame" style="background-color: #e0e0de;">
            <ul>
                <li>

                </li>
            </ul>
            <div class="msj-rta macro">
                <div class="text text-r" style="background:whitesmoke !important">
                    <input class="mytext" placeholder="Type a message"/>
                </div>
            </div>
        </div>
    </div>

@endsection
