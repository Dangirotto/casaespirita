<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Article;


Route::get('/', function () {
    $artigos_main = Article::inRandomOrder()->limit(1)->get();
    foreach($artigos_main as $artigo){
        $artigo_principal = $artigo;
    }
    $artigo_last = Article::orderBy('created_at','desc')->limit(1)->get();
    foreach($artigo_last as $artigo){
        $artigo_ultimo = $artigo;
    }
    $artigos = Article::inRandomOrder()->whereNotIn('id',[$artigo_principal->id])->limit(2)->get();
    return view('welcome', compact('artigos','artigo_principal','artigo_ultimo'));
});

Route::auth();
//Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

// VER ARTIGO
Route::get('/artigos/{id}', function($id){
    $artigo = Article::findOrFail($id);
    return view('artigo', compact('artigo'));
})->name('artigos.show');

// PAINEL ADMINISTRATIVO
Route::group(['middleware'=>'auth'], function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::resource('/admin/artigos', 'AdminArticlesController');
});
