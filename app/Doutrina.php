<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doutrina extends Model
{
    protected $fillable = ['titulo', 'link', 'texto', 'pdf', 'views'];

    public function getPdfAttribute($value){
        if($value == null){
            return '';
        } else {
            return '/pdf/' . $value;
        }
    }
}
