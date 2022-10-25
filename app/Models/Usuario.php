<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//en singular
class Usuario extends Model
{
    protected $table = 'usuarios';
    //para insertar datos
    protected $fillable = [
        'nombre',
        'edad',
        'email',
        'password'
    ];
    use HasFactory;
}
