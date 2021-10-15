<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['provincia'];
}
