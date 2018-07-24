<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'titulo', 'imagem', 'texto', 'autor', 'fonte'];
    protected $images_folder = '/images/';

    public function getImagemAttribute($value){
        if($value == null){
            return 'http://placehold.it/200x200';
        } else {
            return $this->images_folder . $value;
        }
    }

    public function photoPlaceholder(){
        return "http://placehold.it/50x50";
    }

    public function newview(){
        $this->views = $this->views + 1;
        $this->update();
    }

    // ************************* RELATIONS *************************
    public function user(){
        return $this->belongsTo('App\User');
    }
    // *************************************************************
}
