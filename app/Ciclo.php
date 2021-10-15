<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $fillable = ['ciclo'];
    public $autoincrement = false;
    public $timestamps = false;

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

}
