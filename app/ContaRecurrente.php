<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaRecurrente extends Model
{
    public $timestamps = false;

    protected $fillable = ['empresa_id','provcli_id','concepto','tipo'];

    public function empresa(){
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function provcli(){
        return $this->belongsTo(Provcli::class,'provcli_id')->withDefault('');
    }

} 
