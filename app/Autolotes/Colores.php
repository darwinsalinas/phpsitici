<?php

namespace App\Autolotes;

use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
    protected $table = 'colores';
    public $timestamps = true;
    protected $fillable = ['color'];
}
