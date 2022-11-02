<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    protected $fillable = [
        'id_usuario',
        'id_producto',
        'fecha_compra'
    ];
    use HasFactory;
}
