<?php

namespace App\Http\Livewire;

use App\FacturacionDetalle;
use Livewire\Component;

class FacturaciondetalleEdit extends Component
{
    public FacturacionDetalle $facturaciondetalle;

    protected $rules=[
        'facturaciondetalle.concepto'=>'required',
        'facturaciondetalle.unidades'=>'numeric',
        'facturaciondetalle.coste'=>'numeric',
        'facturaciondetalle.iva'=>'numeric',
        'facturaciondetalle.subcuenta'=>'required',
        'facturaciondetalle.suplido'=>'numeric',
        'facturaciondetalle.pagadopor'=>'numeric',
    ];

    public function mount(FacturacionDetalle $facturaciondetalle)
    {
        $this->facturaciondetalle=$facturaciondetalle ?? new FacturacionDetalle();
    }

    public function render()
    {
        return view('livewire.facturaciondetalle-edit');
    }

    public function create()
    {
        // $this->facturaciondetalle = FacturacionDetalle::make(['id'=>'','unidades'=>1,'coste'=>0,'suplido'=>0,'pagadopor'=>0,]); //resetea e inicializa el modelo
        // $this->showEditFacturacionDetalleModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->facturaciondetalle->save();
    }

    public function delete($facturaciondetalle_id)
    {
        FacturacionDetalle::find($facturaciondetalle_id)->delete();

    }

}
