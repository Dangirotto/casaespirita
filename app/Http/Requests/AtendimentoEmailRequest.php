<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AtendimentoEmailRequest extends Request
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
            'email'=>'required|email',
        ];
    }

    public function messages(){
        return[
            'email.email'=>'Por favor insira um endereço de e-mail válido',
            'email.required'=>'Por favor preencha seu e-mail',
        ];
    }
}
