<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function crearUsuario(){
        return 'Se creo un usuario';
    }
    public function modificarUsuario(){
        return 'Se modifico el usuario';
    }
    public function eliminarUsuario($id){
        return 'Se elimino el usuario' . $id;
    }
    public function obtenerUsuarios(){
        //$usuarios = Usuario::all();
        //paginacion de registros
        //$usuarios = Usuario::paginate(40);
        //usuarios en base de datos
        //$usuarios = Usuario::count();
        //usuarios menos de 22 anos
        //get (muchos registros) - first (un solo registro)
        //$usuarios = Usuario::where('edad','<',22)->orderBy('edad','asc')->orderBy('nombre','asc')->get();
        //first
        //$usuarios = Usuario::where('id', '=', 10)->first();
        //suamr todas las edades
        //$usuarios = Usuario::sum('edad');
        //usuarios solo nombre y correo
        //$usuarios = Usuario::select('nombre','email')->get();
        //los ultimos 20
        //$usuarios = Usuario::select('nombre','email')->take(5)->get();
        //usuarios menor de edad
        //$usuarios = Usuario::where('edad', '>',0)->where('edad','<',18)->get();
        //or operator
        $usuarios = Usuario::where('edad', '=',0)->orWhere('edad','<',22)->get();
        return $usuarios;
    }
}
