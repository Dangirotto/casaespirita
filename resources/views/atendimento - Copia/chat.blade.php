@extends('layouts.home')

<link rel="stylesheet" href="/css/chat.css">

@section('content')

    <div class="row">
        <div class="col-md-12 frame" style="background-color: #e0e0de;">
            <ul id="atendimento-chat-fill">
            </ul>
            <div class="msj-rta macro">
                <div class="text text-r" style="background:whitesmoke !important">
                    {!! Form::open(['id'=>'envia-mensagem','method'=>'post', 'action'=>'AtendimentoController@store']) !!}
                        <input type="hidden" name="codigo" value="{{$atendimento->codigo}}">
                        <input class="caixa-de-mensagem mytext" placeholder="Mensagem..."/>
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-arrow-right"></i></button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
<script>

    // jQuery(document).ready(function(){
    //     jQuery('#ajaxSubmit').click(function(e){
    //         e.preventDefault();
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //             }
    //         });
    //     });
    // });

    $(document).ready(function(){

        var atendId = '{{$atendimento->id}}';
        var token = '{{csrf_token()}}';
        updateChat();

        setInterval(function(){
            updateChat();
        }, 2000); // 1000 = 1 second


        function updateChat(){
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //     }
            // });
            $.ajax({
                url:'/ajax_update_chat',
                data:{_token:token,id:atendId, lado:'guest'},
                type:'POST',
                success:function(data){
                    if(!data.error){
                        $('#atendimento-chat-fill').html(data.msg);
                    }
                },
            });
            $("#atendimento-chat-fill").animate({
                scrollTop: 20000
            }, 200);
        } // Function updateChat

        $("#envia-mensagem").submit(function(evt){
            evt.preventDefault();
            var mensagem = $(".mytext").val();
            $.ajax({
                url:'/ajax_chat_msg',
                data:{_token:token,id:atendId,msgx:mensagem,postado:'guest'},
                type:'POST',
                success:function(data){
                    if(!data.error){
                        $(".mytext").val('');
                        updateChat();
                    }
                },
            });
            $("#atendimento-chat-fill").animate({
                scrollTop: 20000
            }, 200);
        });
    });

</script>
@endsection
