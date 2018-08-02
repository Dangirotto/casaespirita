<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'nivel', 'skype'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // ************************* RELATIONS *************************
    public function articles(){
        return $this->hasMany('App\Article');
    }

    public function videos(){
        return $this->hasMany('App\Video');
    }
    // *************************************************************

    public static function nivel($id){
        return User::findOrFail($id)->nivel;
    }

    public static function skype($id){
        return User::findOrFail($id)->skype;
    }

    public function isRoot(){
        if($this->nivel == 'root'){
            return true;
        }else{
            return false;
        }
    }

    public function isAdmin(){
        if($this->nivel == 'admin' || $this->nivel == 'root'){
            return true;
        }else{
            return false;
        }
    }
}
