<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['pais'];

    public function paises()
    {
        return $this->hasMany(Pais::class);
    }

}
