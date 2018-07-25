<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['nome','email','mensagem'];

    public static function novasMensagens(){
        $numero = Contato::where('lida','0')->count();
        return $numero;
    }
}
