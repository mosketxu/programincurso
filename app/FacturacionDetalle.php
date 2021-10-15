<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturacionDetalle extends Model
{
    use HasFactory;

    public $fillable=['facturacion_id','concepto','unidades','coste','iva','subcuenta','email','suplido','pagadopor'];

    const PAGADO_POR = [
        '0' => 'Marta',
        '1' => 'Susana'
    ];

    const IVA_LIST = [
        '0' => '0%',
        '0.04' => '4%',
        '0.10' => '10%',
        '0.21' => '21%'
    ];

    public function facturacion()
    {
        return $this->belongsTo(Facturacion::class);
    }


}
