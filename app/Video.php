<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['user_id', 'titulo', 'link', 'texto', 'autor', 'fonte'];

    public function getLinkAttribute($value){
        if($value == null){
            return 'http://placehold.it/200x200';
        } else {
            $link = str_replace('height="480"','height="248"',$value);
            return $link;
        }
    }

    // ************************* RELATIONS *************************
    public function user(){
        return $this->belongsTo('App\User');
    }
    // *************************************************************
}
