<?php

namespace App\Http\Controllers;

use App\Models\venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function obtenerVentas(){
        $venta = venta::all();
        return response($venta, 200);
    }

    public function obtenerVenta($id){
        $venta = venta::find($id);
        if($venta != null){
            return response($venta, 200);
        }
        return response('No se encontro', 404);
    }

    public function crearVenta(Request $request){
        $data = $request->validate($this->validateRequest());
        $venta = venta::create($data);
        return response([
            'Mensaje' => 'El producto se creo',
            'id'=>$venta['id']
        ], 201);
    }

    public function actualizarVenta($id, Request $request){
        $venta = venta::find($id);
        if (!$venta) {
            return response([
                'message' => 'No existe la venta'
            ], 404);
        }
        $data = $request->validate($this->validateRequest());

        $venta->update($data);
        return response([
            'message'=> 'se modifico la venta'
        ], 201);
    }

    public function eliminarVenta($id)
    {
        $venta = venta::find($id);
        if (!$venta) {
            return response([
                'message' => 'El productos con el id ' . $id . ' no existe en la base de datos'
            ], 404);
        }
        //se elimina
        $venta->delete();
        return response([
            'message' => 'Se elimino con exito'
        ]);
    }

    //factorizar codigo
    private function validateRequest()
    {
        return [
            'id_usuario'=>'required|exists:usuarios,id',
            'id_producto'=>'required|exists:productos,id',
            'fecha_compra'=>'required|date',
        ];
    }
}
