<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Article::orderBy('id','desc')->get();
        return view('admin.artigos.index', compact('artigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artigos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();
        if($file = $request->file('file')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
//            $photo = Photo::create(['file'=>$name]);
            $input['imagem'] = $name;
        }
        $input['user_id'] = $user->id;
        Article::create($input);
        Session::flash('adminArticlesSuccessMessage', 'Artigo criado com sucesso!');
        return redirect(route('admin.artigos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $artigo = Article::findOrFail($id);
//        return $artigo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artigo = Article::findOrFail($id);
        return view('admin.artigos.edit', compact('artigo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artigo = Article::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('file')){
            unlink(public_path() . $artigo->imagem);
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['imagem'] = $name;
        }
        $artigo->update($input);
        Session::flash('adminArticlesSuccessMessage', 'Artigo atualizado com sucesso!');
        return redirect(route('admin.artigos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artigo = Article::findOrFail($id);
        unlink(public_path() . $artigo->imagem);
        $artigo->delete();
        Session::flash('adminArticlesSuccessMessage', 'Artigo apagado com sucesso!');
        return redirect(route('admin.artigos.index'));
    }
}
