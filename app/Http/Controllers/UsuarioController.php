<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;

class UsuarioController extends Controller
{
    public function crearUsuario(Request $request)
    {

        //crear usuarios en base de datos de manera correcta
        //$data = $request->all();
        //validar los datos para que sean correctos
        $data = $request->validate($this->validateRequest());
        $usuario = Usuario::create($data);
        return response([
            'Mensaje' => 'El usuario se creo de manera exitosa',
            'id' => $usuario['id']
        ], 201);
    }

    public function iniciarSesion(Request $request){
        $data = $request->validate($this->validateLoginRequest());
        $usuario = Usuario::where('email', '=', $data['email'])->where('password', '=', $data['password'])->first();
        if (!$usuario) {
            return response(['Usuario NO ENCONTRADO'],404);
        }
        $token = $usuario->createToken('token-user')->plainTextToken;
        return Response([
            'usuario'=>$usuario,
            'token'=>$token
        ]);
    }

    public function modificarUsuario($id, Request $request)
    {
        //buscar usuario con id
        $usuario = Usuario::find($id);
        //return $usuario;
        //validar que exista el usuario
        if (!$usuario) {
            return response([
                'message' => 'El usuario con el ID ' . $id . ' No existe en la base de datos'
            ], 404);
        }
        //si existe el usuario
        $data = $request->validate($this->validateRequest());

        //ya esta validado los cambios
        $usuario->update($data);
        return response([
            'message' => 'Se modifico el usuario con exito'
        ], 201);
    }

    public function eliminarUsuario($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response([
                'message' => 'El usuario con el id ' . $id . ' no existe en la base de datos'
            ], 404);
        }
        //se elimina
        $usuario->delete();
        return response([
            'message' => 'Se elimino con exito'
        ]);
    }
    public function obtenerUsuarios()
    {

        //paginacion de registros
        //$usuarios = Usuario::paginate(40);
        //usuarios en base de datos

        //$usuarios = Usuario::count();

        //usuarios menos de 22 anos
        //get (muchos registros) - first (un solo registro)
        //$usuarios = Usuario::where('edad','<',22)->orderBy('edad','asc')->orderBy('nombre','asc')->get();
        //first
        //$usuarios = Usuario::where('id', '=', 10)->first();
        //sumar todas las edades
        //$usuarios = Usuario::sum('edad');
        //usuarios solo nombre y correo

        //$usuarios = Usuario::select('nombre','email')->get();

        //los ultimos 20
        //$usuarios = Usuario::select('nombre','email')->take(5)->get();
        //usuarios menor de edad
        //$usuarios = Usuario::where('edad', '>',0)->where('edad','<',18)->get();
        //or operator
        //$usuarios = Usuario::where('edad', '=',0)->orWhere('edad','<',22)->get();
        $usuarios = Usuario::all();
        return $usuarios;
    }

    //factorizar codigo
    private function validateRequest()
    {
        return [
            'nombre' => 'required|string',
            'email' => 'required|string|email|unique:usuarios',
            'password' => 'required|string|min:3',
            'edad' => 'nullable|numeric'
        ];
    }

    private function validateLoginRequest()
    {
        return [
            'email' => 'required|string|email|',
            'password' => 'required|string|min:3',
        ];
    }
}
