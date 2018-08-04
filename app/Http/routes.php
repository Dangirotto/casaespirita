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
use App\Contato;
use App\Doutrina;
use App\User;
use App\Video;


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
})->name('atendimento.continuar');

// AJAX
Route::get('ajax',function(){
    return view('message');
});
Route::post('/ajax_update_chat','AjaxController@updateChat');
Route::post('/ajax_chat_msg','AjaxController@msgChat');

// VER ARTIGO
Route::get('/artigos/{id}', function($id){
    $artigo = Article::findOrFail($id);
    $artigo->newview();
    return view('artigo', compact('artigo'));
})->name('artigos.show');

// ARTIGOS/NOTICIAS
Route::get('/artigos', function(){
    $artigos = Article::orderBy('id','desc')->paginate(5);
    return view('artigosnoticias', compact('artigos'));
})->name('artigos.list');

// VER VÍDEO
Route::get('/videos/{id}', function($id){
    $video = Video::findOrFail($id);
    $video->newview();
    return view('video', compact('video'));
})->name('videos.show');

// VÍDEOS
Route::get('/videos', function(){
    $videos = Video::orderBy('id','desc')->paginate(5);
    return view('videos', compact('videos'));
})->name('videos.list');

// DOUTRINA
Route::get('/doutrina', function(){
    $doutrinas = Doutrina::orderBy('id','asc')->get();
    return view('doutrina', compact('doutrinas'));
})->name('doutrina');

// VER DOUTRINA
Route::get('/doutrina/{id}', function($id){
    $doutrina = Doutrina::findOrFail($id);
    $doutrina->newview();
    return view('verdoutrina', compact('doutrina'));
})->name('doutrina.show');

//CONTATO
Route::get('/contato', function(){
    return view('contato');
})->name('contato');
Route::post('/contato/envia', 'ContatoController@enviaContato')->name('contato.envia');

//CASAS
Route::get('/casas', function(){
    return view('casas.index');
})->name('casas');

//Livros
Route::get('/livros', function(){
    return view('livros.index');
})->name('livros');

// PAINEL ADMINISTRATIVO
Route::group(['middleware'=>'auth'], function(){

    // MAIN PAGE
    Route::get('/admin', function(){
        $novas_mensagens = Contato::novasMensagens();
        $atendimentos_abertos = Atendimento::numAtendimentosAbertos();
        $nivel = User::nivel(Auth::user()->id);
        return view('admin.index', compact('novas_mensagens','atendimentos_abertos','nivel'));
    })->name('admin.index');

    //ARTIGOS
    Route::resource('/admin/artigos', 'AdminArticlesController');

    //VIDEOS
    Route::resource('/admin/videos', 'AdminVideoController');

    //CALENDARIO
    Route::resource('/admin/calendario', 'AdminDisponibilidadeController');
//    Route::get('/admin/calendario/{id}','AdminDisponibilidadeController@verEvento');

});

Route::group(['middleware'=>'admin'], function(){

    //DOUTRINAS
    Route::resource('/admin/doutrinas', 'AdminDoutrinasController');

    //CONTATO
    Route::resource('/admin/contato', 'AdminContatoController');

    //ATENDIMENTO FRATERNO
    Route::resource('/admin/atendimento', 'AdminAtendimentoController');
    Route::post('/admin/atendimento/{id}/assumir', 'AdminAtendimentoController@assumir');
    Route::get('admin/atendimento/atender/{id}', function($id){
        $atendimento = Atendimento::findOrFail($id);
        return view('admin.atendimento.chat', compact('atendimento'));
    })->name('admin.atendimento.atender');

});

Route::group(['middleware'=>'root'], function(){

    //USUÁRIOS
    Route::resource('/admin/usuarios', 'AdminUsersController');

});
