<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disponibilidade extends Model
{
    protected $fillable = ['user_id', 'inicio', 'final', 'marcado'];

}
