<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //esto se hace cuando el ID no sea un entero y sea un string
    //se le deben de especificar los siguientes casos
    protected $primaryKey = 'matricula';
    protected $keyType = 'string';
    public $incrementing = 'false';
    use HasFactory;
}
