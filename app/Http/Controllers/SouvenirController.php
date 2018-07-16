<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Flash;
use Exception;

class SouvenirController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	return view('souvenir.index');
    }

    public function buscar_doc(Request $request)
    {
		$buscar = DB::select("SELECT * FROM `b_respuestas_historic_1` 
WHERE persona ='$request->documento' 
AND respuestas_historic_1 NOT IN (SELECT b_respuestas_historic_1 FROM `souvenirs` WHERE persona ='$request->documento')");
    	return view('souvenir.buscar')->with('buscar',$buscar);
    }

    public function entregar(Request $request)
    {
    	
		$buscar = DB::select("
					INSERT INTO souvenirs (
					  `persona`,
					  `b_respuestas_historic_1`
					) 
					VALUES
					(
					    '$request->persona',
					    '$request->respuestas_historic_1'
					);
				");
		Flash::success('Guardado exitosamente.');
    	return view('souvenir.index')->with('buscar',$buscar);
    }

}
