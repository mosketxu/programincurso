<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaImpuesto extends Model
{
    protected $fillable = ['categoria','empresa_id','impuesto_id','ciclo_id'];

    public function empresa(){
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function impuesto(){
        return $this->belongsTo(Impuesto::class,'impuesto_id');
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class,'impuesto_id');
    }


}
