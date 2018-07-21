<?php

namespace App\Http\Controllers;

use App\Atendimento;
use Illuminate\Http\Request;

use App\Http\Requests;

class AjaxController extends Controller
{
    public function updateChat(){
        $id = $_POST['id'];
        $mensagem = '';
        $atendimento = Atendimento::findOrFail($id);
        foreach($atendimento->chats()->orderBy('id','asc')->get() as $chat){
            if($chat->postado_por == 'guest'){
                $mensagem .= "<li style=\"width:100%\">";
                    $mensagem .= "<div class=\"msj-rta macro\">";
                        $mensagem .= "<div class=\"text text-r\">";
                            $mensagem .= "<p>" . $chat->mensagem . "</p>";
                            $mensagem .= "<p><small>" . $chat->created_at->diffForHumans() . "</small></p>";
                        $mensagem .= "</div>";
                    $mensagem .= "</div>";
                $mensagem .= "</li>";
            }else{
                $mensagem .= "<li style=\"width:100%\">";
                    $mensagem .= "<div class=\"msj macro\">";
                        $mensagem .= "<div class=\"text text-l\">";
                            $mensagem .= "<p>" . $chat->mensagem . "</p>";
                            $mensagem .= "<p><small>" . $chat->created_at->diffForHumans() . "</small></p>";
                        $mensagem .= "</div>";
                    $mensagem .= "</div>";
                $mensagem .= "</li>";
            }
        }
        return response()->json(array('msg'=> $mensagem), 200);
    }

    public function msgChat(){
        $id = $_POST['id'];
        $postado = $_POST['postado'];
        $mensagem = $_POST['msgx'];
        $atendimento = Atendimento::findOrFail($id);
        $dados = [
            'atendimento_id'=>$id ,
            'postado_por'=>$postado,
            'mensagem'=>$mensagem
        ];
        $atendimento->chats()->create($dados);
    }
}
