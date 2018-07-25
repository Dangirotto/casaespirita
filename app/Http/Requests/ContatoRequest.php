<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContatoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=>'required|min:4',
            'email'=>'required|email',
            'mensagem'=>'required|min:10',
        ];
    }

    public function messages(){
        return[
            'email.email'       =>'Por favor insira um endereço de e-mail válido',
            'email.required'    =>'Por favor preencha seu e-mail',
            'nome.required'     =>'Por favor digite seu nome',
            'nome.min'          =>'Seu nome deve ter no mínimo 4 letras',
            'mensagem.required' =>'Escreva uma mensagem',
            'mensagem.min'      =>'Sua mensagem deve ter no mínimo 10 letras',
        ];
    }
}
