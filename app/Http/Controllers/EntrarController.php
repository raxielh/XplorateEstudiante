<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Flash;
use Exception;

class EntrarController extends Controller
{
    public function login(Request $request){

    	$est=DB::select("
			SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$request->cedula."' AND pass='".$request->pass."' LIMIT 1
        ");

		foreach ($est as $e) {
		    $cedula=$e->cedula;
		    $nombre=$e->nombre;
		    $apellido=$e->apellido;
		}

		if(count($est)==1){
			Session::put('estudiante',$cedula);
			return view('test.menu')->with('nombre', $nombre)->with('apellido', $apellido);
		}else{
			Flash::error('Datos Incorrectos');
			return view('test.index');
		}
       

    }

    public function salir(){
    	Session::forget('estudiante');
    	return view('test.index');
    }
}
