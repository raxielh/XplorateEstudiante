<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Flash;
use Exception;

class OrdenController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function proceso_orden_categoria(request $request)
    {
    	header('Access-Control-Allow-Origin: *');
    	$array_cursos = $request['miorden'];
    	$orden = 1;
		foreach($array_cursos as $id_curso){
			$resultado_cursos=DB::select("UPDATE categoria SET orden = $orden WHERE id = $id_curso");
			$orden++;
		}
    	return "Reordenado";
    }

    public function proceso_orden_preguntas(request $request)
    {
    	header('Access-Control-Allow-Origin: *');
    	$array_cursos = $request['miorden'];
    	$orden = 1;
		foreach($array_cursos as $id_curso){
			$resultado_cursos=DB::select("UPDATE preguntas SET orden = $orden WHERE id = $id_curso");
			$orden++;
		}
    	return "Reordenado";
    }

    public function proceso_orden_pr(request $request)
    {
    	header('Access-Control-Allow-Origin: *');
    	$array_cursos = $request['miorden'];
    	$orden = 1;
		foreach($array_cursos as $id_curso){
			$resultado_cursos=DB::select("UPDATE posibles_respuestas SET orden = $orden WHERE id = $id_curso");
			$orden++;
		}
    	return "Reordenado";
    }


}
