<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensagens = Contato::orderBy('respondida','asc')->get();
        return view('admin.contato.index', compact('mensagens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $mensagem = Contato::findOrFail($id);
        $mensagem->lida = '1';
        $mensagem->update();
        return view('admin.contato.responder', compact('mensagem'));
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
        $contato = Contato::findOrFail($id);
        $input = $request->all();
        $data = [
            'email'=>$contato->email,
            'nome'=>$contato->nome,
            'data_envio'=>$contato->created_at,
            'resposta'=> $input['resposta'],
            'mensagem_original'=> $contato->mensagem,
        ];
        Mail::send('emails.respostacontato', $data, function($message) use ($data){
            $message->to($data['email'], $data['nome'])->subject('Contato - Portal Espírita');
        });
        Session::flash('adminMensagensSuccessMessage','Resposta enviada via e-mail com sucesso!');
        $contato->respondida = '1';
        $contato->update();
        return redirect(route('admin.contato.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
