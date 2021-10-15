<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProvcliRequest extends FormRequest
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
            'nombre'=>'required',
            'nif'=>'max:12',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'nombre'=>'unique:provclis,nombre',
                'nif'=>'unique:provclis,nif',
            ];
        }

        return $rules;
    }

    public function messages(){
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique' => 'El nombre ya existe.',
            'nif.unique' => 'El nif ya existe.',
            'nif.max' => 'El Nif tiene un máximo de 12 caracteres',
        ];
    }
}
