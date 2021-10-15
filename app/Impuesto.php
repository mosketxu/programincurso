<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    protected $fillable = ['modelo','impuesto','periodo_id','observaciones'];
    public $autoincrement = false;
    public $timestamps = false;

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

}
