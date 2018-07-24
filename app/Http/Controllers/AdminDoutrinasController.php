<?php

namespace App\Http\Controllers;

use App\Doutrina;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminDoutrinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doutrinas = Doutrina::all();
        return view('admin.doutrina.index', compact('doutrinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doutrina.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($file = $request->file('file')){
            $name = time() . $file->getClientOriginalName();
            $file->move('pdf', $name);
//            $photo = Photo::create(['file'=>$name]);
            $input['pdf'] = $name;
        }
        Doutrina::create($input);
        Session::flash('adminDoutrinasSuccessMessage', 'Cadastro criado com sucesso!');
        return redirect(route('admin.doutrinas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doutrina = Doutrina::findOrFail($id);
        return view('admin.doutrina.edit', compact('doutrina'));
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
        $doutrina = Doutrina::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('file')){
            unlink(public_path() . $doutrina->pdf);
            $name = time() . $file->getClientOriginalName();
            $file->move('pdf', $name);
            $input['pdf'] = $name;
        }
        $doutrina->update($input);
        Session::flash('adminDoutrinasSuccessMessage', 'Cadastro atualizado com sucesso!');
        return redirect(route('admin.doutrinas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doutrina = Doutrina::findOrFail($id);
        if($doutrina->pdf){
            unlink(public_path() . $doutrina->pdf);
        }
        $doutrina->delete();
        Session::flash('adminDoutrinasSuccessMessage', 'Cadastro apagado com sucesso!');
        return redirect(route('admin.doutrinas.index'));
    }
}
