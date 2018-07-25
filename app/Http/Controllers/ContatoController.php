<?php

namespace App\Http\Controllers;

use App\Contato;
use App\Http\Requests\ContatoRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ContatoController extends Controller
{
    public function enviaContato(ContatoRequest $request){
        Contato::create($request->all());
        Session::flash('contatoSuccessMessage','Obrigado pelo contato! Em breve você receberá uma resposta no e-mail informado.');
        return redirect(route('contato'));
    }
}
