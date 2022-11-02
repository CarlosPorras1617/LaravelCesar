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

    public function crearProducto(Request $request){
        $data = $request->validate($this->validateRequest());
        $producto = Producto::create($data);
        return response([
            'Mensaje' => 'El producto se creo',
            'id'=>$producto['id']
        ], 201);
    }

    public function actualizarProducto($id, Request $request){
        $productos = Producto::find($id);
        if (!$productos) {
            return response([
                'message' => 'No existe el producto'
            ], 404);
        }
        $data = $request->validate($this->validateRequest());

        $productos->update($data);
        return response([
            'message'=> 'se modifico el producto'
        ], 201);
    }

    public function eliminarProducto($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response([
                'message' => 'El productos con el id ' . $id . ' no existe en la base de datos'
            ], 404);
        }
        //se elimina
        $producto->delete();
        return response([
            'message' => 'Se elimino con exito'
        ]);
    }

    //factorizar codigo
    private function validateRequest()
    {
        return [
            'nombre'=>'required|string',
            'cantidad'=>'required|numeric',
            'precio'=>'required|numeric|min:1',
            'descripcion'=>'required|string|max:200'
        ];
    }
}
