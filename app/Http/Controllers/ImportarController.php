<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Flash;
use Exception;

class ImportarController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
    	$campus = DB::select("SELECT * FROM ps_campus");
    	$programa = DB::select("SELECT * FROM ps_acad_prog where acad_career='PREG' order by campus");

    	return view('importar.index')->with('campus', $campus)->with('programa', $programa);
    }

    public function index2(request $request)
    {
    	$fileName = date('Y_m_d H').'.'.$request->file('archivo')->getClientOriginalExtension();
    	$input = $request->file('archivo');
	    $request->file('archivo')->move(
	    	base_path().'/public/datos/',$fileName
	    );
	    $url = base_path().'/public/datos/'.$fileName;
    
    	//return ($url);
    	set_time_limit(0);
    	Excel::load($url, function($reader) {
    		foreach ($reader->get() as $persona) {
    			//echo $persona;

    			$c=DB::select("SELECT count(*) as c FROM b_persona_categoria WHERE cedula=".$persona->cedula);
    			foreach ($c as $c) {
				    if($c->c==0){

					    DB::select("
							INSERT INTO `b_persona_categoria` (
							  `persona_categoria`,
							  `cedula`,
							  `tipoempleado`,
							  `acad_prog`,
							  `cargo`,
							  `campus`,
							  `strm`,
							  `nombre`,
							  `correo`,
							  `telefono`,
							  `emplid`,
							  `numeros_rowdata`
							) 
							VALUES
							  (
							    null,
							    '".$persona->cedula."',
							    0,
							    '".$persona->acad_prog."',
							    3,
							    '".$persona->campus."',
							    1761,
							    '".$persona->nombre."',
							    '".$persona->correo."',
							    '".$persona->telefono."',
							    '".$persona->emplid."',
							    0
							  ) ;
				        ");

				    }
				}
		    
    		}
    	});

    	return view('importar.render');
  
    }

}
