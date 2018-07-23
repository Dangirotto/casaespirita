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
use App\Atendimento;
use App\Chat;


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

// ATENDIMENTO FRATERNO
Route::resource('/atendimento', 'AtendimentoController');
Route::post('/atendimento/iniciar', 'AtendimentoController@iniciar_atendimento');
//Route::get('/atendimento/continuar/{codigo}', 'AtendimentoController@continuar_atendimento');
Route::post('/atendimento/retomar', 'AtendimentoController@continuar_atendimento');
Route::get('/atendimento/continuar/{codigo}', function($codigo){
    $atendimento = Atendimento::where('codigo',$codigo)->first();
    return view('atendimento.chat', compact('atendimento'));
});

// AJAX
Route::get('ajax',function(){
    return view('message');
});
Route::post('/ajax_update_chat','AjaxController@updateChat');
Route::post('/ajax_chat_msg','AjaxController@msgChat');

// VER ARTIGO
Route::get('/artigos/{id}', function($id){
    $artigo = Article::findOrFail($id);
    return view('artigo', compact('artigo'));
})->name('artigos.show');

// ARTIGOS/NOTICIAS
Route::get('/artigos', function(){
    $artigos = Article::orderBy('id','desc')->paginate(3);
    return view('artigosnoticias', compact('artigos'));
})->name('artigos.list');

// PAINEL ADMINISTRATIVO
Route::group(['middleware'=>'auth'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('/admin/artigos', 'AdminArticlesController');

    Route::resource('/admin/atendimento', 'AdminAtendimentoController');
    Route::post('/admin/atendimento/{id}/assumir', 'AdminAtendimentoController@assumir');
    Route::get('admin/atendimento/atender/{id}', function($id){
        $atendimento = Atendimento::findOrFail($id);
        return view('admin.atendimento.chat', compact('atendimento'));
    })->name('admin.atendimento.atender');

});
