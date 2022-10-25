<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    //
    public function show($matricula)
    {
        //$docente= Docente::where('matricula', '=',$matricula)->first();
        $docente = Docente::find($matricula);
        if($docente != null){
            return response($docente, 200);
        }
        return response('No se encontro', 404);
    }
}
