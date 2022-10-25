<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function mostrarTotalEstudiantes(){
        //$estudiantesHombres = Estudiante::select('genero', '=', 'male');
        $estudiantesHombresBecados = Estudiante::where('genero', '=', 'male')->where('becado', '=', 'true')->get()->count();
        $estudiantesMujeresBecados = Estudiante::where('genero', '=', 'female')->where('becado', '=', 'true')->get()->count();
        $estudiantesHombresNoBecados = Estudiante::where('genero', '=', 'male')->where('becado', '=', 'false')->get()->count();
        $estudiantesMujeresNoBecados = Estudiante::where('genero', '=', 'female')->where('becado', '=', 'false')->get()->count();
        $estudiantesHombre = Estudiante::where('genero', '=', 'male')->orderBy('fecha_de_inscripcion','asc')->get();
        $estudiantesMujeres = Estudiante::where('genero', '=', 'male')->orderBy('fecha_de_inscripcion','desc')->get();
        return response([
            'Los estudiantes hombres Becados son: ' => $estudiantesHombresBecados,
            'Los estudiantes mujeres Becadas son: ' => $estudiantesMujeresBecados,
            'Los estudiantes hombres no becados son: ' => $estudiantesHombresNoBecados,
            'Los estudiantes mujeres no becados son: ' => $estudiantesMujeresNoBecados,
            'Estudiantes' =>[
                'Estudiantes Hombre' => $estudiantesHombre,
                'Estudiantes Mujeres' => $estudiantesMujeres
            ]
    ]);
    }



}
