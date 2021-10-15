<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactoRequest extends FormRequest
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
    public function rules(){
        $rules= [
            'empresa'=>[
                'required',
                Rule::unique('empresas')->ignore($this->id),
            ],
            'codpostal'=>'max:10',
            'nif'=>[
                'nullable',
                'max:12',
                Rule::unique('empresas')->ignore($this->id),
            ],
            'tfno'=>'max:50',
            'emailgral' => 'nullable|email:rfc',
            'emailadm'=>'nullable|email:rfc',
        ];

        if (!$this->id) {
            $rules += [
                'empresa'=>'unique:empresas,empresa',
                'nif'=>'nullable|unique:empresas,nif',
            ];
        }

        return $rules;
    }

    public function messages(){
        return [
            'empresa.required' => 'El nombre del contacto es obligatorio.',
            'empresa.unique' => 'El nombre del contacto ya existe.',
            'emailgral.email' => 'Añade un :attribute válido',
            'emailadm.email' => 'Añade un :attribute válido',
            'nif.unique' => 'El Nif ya existe',
            'nif.max' => 'El Nif tiene un máximo de 12 caracteres',
            'tfno.max' => 'El Tfno tiene un máximo de 25 caracteres',
        ];
    }
}
