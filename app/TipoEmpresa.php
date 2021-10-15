<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEmpresa extends Model
{
    protected $primaryKey='tipoempresa';
    public $incrementing=false;
    protected $fillable = ['tipoempresa'];
}
