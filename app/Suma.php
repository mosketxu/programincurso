<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suma extends Model
{
    protected $fillable = ['id'];

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

}
