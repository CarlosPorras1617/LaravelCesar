<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //insertar datos
    protected $fillable = [
        'nombre',
        'cantidad',
        'precio',
        'descripcion'
    ];
    use HasFactory;
}
