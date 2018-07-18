<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['atendimento_id', 'postado_por', 'mensagem', 'lido'];

    // RELATIONS
    public function atendimento(){
        return $this->belongsTo('App\Atendimento');
    }
    // *********

}
