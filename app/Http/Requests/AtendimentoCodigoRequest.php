<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AtendimentoCodigoRequest extends Request
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
            'codigo'=>'required',
        ];
    }

    public function messages(){
        return[
            'codigo.required'=>'Favor inserir seu código de atendimento',
        ];
    }
}
