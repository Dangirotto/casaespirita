<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtendimentoCodigoRequest;
use App\Http\Requests\AtendimentoEmailRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('atendimento.index');
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
        //
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
        //
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

    //MEUS METODOS
    public function iniciar_atendimento(AtendimentoEmailRequest $request){
//        return $request->all();
        $email = $request->email;
        $codigo = bcrypt(time().$email);
        $data = [
            'email'=>$email,
            'codigo'=>$codigo
        ];
        Mail::send('emails.atendinicio', $data, function($message) use ($data){
            $message->to($data['email'], 'Amigo')->subject('Atendimento Fraterno - Código');
        });
        Session::flash('adminAtendimentoSuccessMessage','Atendimento solicitado! Foi enviado para você um e-mail com as instruções para iniciar seu atendimento');
        return redirect(route('atendimento.index'));
    }

    public function continuar_atendimento(AtendimentoCodigoRequest $request){
        return $request->all();
    }
}
