<?php

namespace App\Http\Requests;

use App\Provcli;
use Illuminate\Foundation\Http\FormRequest;

class ContaRequest extends FormRequest
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

    public function prepareForValidation()
    {
        if (is_null($this->input('factura')))
            $this->merge(['factura'=>'']);
        if (is_null($this->input('fechafactura')))
            $this->merge(['fechafactura'=>$this->input('fechaasiento')]);
        if (is_null($this->input('base21')))
            $this->merge(['base21'=>'0']);
        if (is_null($this->input('iva21')))
            $this->merge(['iva21'=>'0']);
        if (is_null($this->input('base10')))
            $this->merge(['base10'=>'0']);
        if (is_null($this->input('iva10')))
            $this->merge(['iva10'=>'0']);
        if (is_null($this->input('base4')))
            $this->merge(['base4'=>'0']);
        if (is_null($this->input('iva4')))
            $this->merge(['iva4'=>'0']);
        if (is_null($this->input('exento')))
            $this->merge(['exento'=>'0']);
        if (is_null($this->input('baseretencion')))
            $this->merge(['baseretencion'=>'0']);
        if (is_null($this->input('retencion')))
            $this->merge(['retencion'=>'0']);
        if ($this->input('porcentajeretencion')==0){
            $this->merge(['baseretencion'=>'0']);
            $this->merge(['retencion'=>'0']);
        }
        if (is_null($this->input('baserecargo')))
            $this->merge(['baserecargo'=>'0']);
        if (is_null($this->input('recargo')))
            $this->merge(['recargo'=>'0']);
        if ($this->input('porcentajerecargo')==0){
            $this->merge(['baserecargo'=>'0']);
            $this->merge(['recargo'=>'0']);
        }
        $this->merge(['base21'=>str_replace(',','', $this->input('base21'))]);
        $this->merge(['iva21'=>str_replace(',','', $this->input('iva21'))]);
        $this->merge(['base10'=>str_replace(',','', $this->input('base10'))]);
        $this->merge(['iva10'=>str_replace(',','', $this->input('iva10'))]);
        $this->merge(['base4'=>str_replace(',','', $this->input('base4'))]);
        $this->merge(['iva4'=>str_replace(',','', $this->input('iva4'))]);
        $this->merge(['exento'=>str_replace(',','', $this->input('exento'))]);
        $this->merge(['baseretencion'=>str_replace(',','', $this->input('baseretencion'))]);
        $this->merge(['retencion'=>str_replace(',','', $this->input('retencion'))]);
        $this->merge(['baserecargo'=>str_replace(',','', $this->input('baserecargo'))]);
        $this->merge(['recargo'=>str_replace(',','', $this->input('recargo'))]);

    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $rules= [
            'fechaasiento'=>'required|date',
            'fechafactura'=>'nullable|date',
            'provcli_id'=>'required',
            'base21'=>'nullable',
            'iva21'=>'nullable|numeric',
            'base10'=>'nullable|numeric',
            'iva10'=>'nullable|numeric',
            'base4'=>'nullable|numeric',
            'iva4'=>'nullable|numeric',
            'exento'=>'nullable|numeric',
            'baseretencion'=>'nullable|numeric',
            'porcentajeretencion'=>'nullable|numeric',
            'retencion'=>'nullable|numeric',
            'baserecargo'=>'nullable|numeric',
            'porcentajerecargo'=>'nullable|numeric',
            'recargo'=>'nullable|numeric',
        ];

        return $rules;
    }

    public function messages(){
        return [
            'provcli_id.required'=>'El proveedor es obligatorio',
            'fechaasiento.required'=>'La fecha asiento es obligatoria',
            'fechaasiento.date'=>'La fecha asiento debe ser tipo fecha',
            'fechafactura.date'=>'La fecha factura debe ser tipo fecha',
            'base21'=>'La base al 21 debe ser numérica',
            'iva21'=>'El IVA al 21 debe ser numérica',
            'base10'=>'La base al 10 debe ser numérica',
            'iva10'=>'El IVA al 10 debe ser numérica',
            'base4'=>'La base al 4 debe ser numérica',
            'iva4'=>'El IVA al 4 debe ser numérica',
            'exento'=>'El valor exento debe ser numérico',
            'baseretencion'=>'La base de retención debe ser numérica',
            'porcentajeretencion'=>'El % de retención debe ser numérico',
            'retencion'=>'La retención debe ser numérica',
            'baseretencion'=>'La base de recargo debe ser numérica',
            'porcentajeretencion'=>'El % de recargo debe ser numérico',
            'recargo'=>'El recargo debe ser numérico',
        ];
    }
}
