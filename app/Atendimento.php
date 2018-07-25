<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    protected $fillable = ['email', 'codigo', 'user_id','ativo'];

    // RELATIONS
    public function chats(){
        return $this->hasMany('App\Chat');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
    // *********

    public function ultimaMensagem(){
        $ultimo_chat = $this->chats()->orderBy('id','desc')->first();
        return $ultimo_chat->created_at;
    }

    public function numeroNaoLidas(){
        $naoLidas = $this->chats()->where('lido','0')->where('postado_por','guest')->count();
        return $naoLidas;
    }

    public static function numAtendimentosAbertos(){
        $numero = Atendimento::where('user_id','0')->count();
        return $numero;
    }
}
