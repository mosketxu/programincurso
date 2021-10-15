<?php

namespace App\Http\Livewire;

use App\Facturacion;
use Livewire\Component;

class Facturaciondetalle extends Component
{
    public Facturacion $facturacion;


    protected $rules=[
        // 'facturacion.fechavto'=>'required',
    ];

    public function mount(Facturacion $facturacion)
    {
        $this->facturacion = $facturacion ?? new Facturacion();
    }

    public function render()
    {
        return view('livewire.facturaciondetalle');
    }
}
