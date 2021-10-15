<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['categoria'];
    public $autoincrement = false;

    public function contas(){
        return $this->hasMany(Conta::class,'categoria_id')->withDefault('');
    }

    public function provclis(){
        return $this->hasMany(Provcli::class,'categoria_id')->withDefault('');
    }

}
