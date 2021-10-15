<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pu extends Model
{
    protected $guarded = ['id']; 

    public function pais()
    {
        return $this->belongsTo(Empresa::class);
    }

}
