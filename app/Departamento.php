<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey='departamento';
    
    protected $fillable = ['departamento'];


}
