<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'name'=>'required|min:4',
            'email'=>'required|email',
            'password'=>'required|min:6',
            'nivel'=>'required',
            'skype'=>'required',
        ];
    }

    public function messages(){
        return[
            'email.email'       =>'Por favor insira um endereço de e-mail válido',
            'email.required'    =>'Por favor preencha seu e-mail',
            'name.required'     =>'Por favor digite seu nome',
            'name.min'          =>'Seu nome deve ter no mínimo 4 letras',
            'password.required' =>'Digite uma senha',
            'password.min'      =>'Sua senha deve ter no mínimo 6 letras',
            'nivel.required'     =>'Por favor escolha um nível',
            'skype.required'     =>'Por favor digite o usuário do skype',
        ];
    }
}
