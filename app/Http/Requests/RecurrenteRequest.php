<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecurrenteRequest extends FormRequest
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
        $rules= [
            'tipo'=>'required',
            'concepto'=>'required',
            'provcli_id'=>'required',
        ];

        return $rules;
    }

    public function messages(){
        return [
            'tipo.required' => 'El Tipo obligatorio.',
            'concepto.required' => 'El Concepto obligatorio.',
            'provcli_id.required' => 'El proveedor es obligatorio.',
        ];
    }

}
