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
}
