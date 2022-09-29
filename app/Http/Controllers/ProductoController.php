<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function obtenerProductos(){
        $productos = Producto::all();
        return response($productos, 200);
    }

    public function obtenerProducto($id){
        $producto = Producto::find($id);
        if($producto != null){
            return response($producto, 200);
        }
        return response('No se encontro', 404);
    }
}
