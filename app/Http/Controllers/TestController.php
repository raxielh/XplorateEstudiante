<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\Respuestas;
use Session;
use Flash;
use Exception;

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test.index');
    }

    public function bienvenido()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        $res=DB::select("
            SELECT count(*) as c FROM respuestas WHERE persona='".$cedula."'
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){
            return view('test.bienvenido')->with('res', $res)->with('nombre', $nombre)->with('apellido', $apellido);
        }else{
            return view('test.index');
        }
    }

    public function test()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }

        $cantidad_pregunta=DB::select("
            SELECT count(*) as c FROM preguntas p
        ");


        $pregunta=DB::select("
            SELECT p.* FROM preguntas p,categoria c
            WHERE p.`id` NOT IN(SELECT pregunta FROM respuestas WHERE persona='".$cedula."' ) 
            AND p.categoria=c.id
            ORDER BY c.orden ASC limit 1
        ");

        $respuestas=DB::select("
            SELECT count(*) as c FROM respuestas
            WHERE persona='".$cedula."'
        ");

        $categorias=DB::select("
            SELECT * FROM categoria order by orden ASC
        ");

        $ps=DB::select("
            SELECT * FROM posibles_respuestas order by orden ASC
        ");

        if(count($est)==1){
            return view('test.test')
            ->with('nombre', $nombre)
            ->with('apellido', $apellido)
            ->with('categorias', $categorias)
            ->with('pregunta', $pregunta)
            ->with('cantidad_pregunta', $cantidad_pregunta)
            ->with('respuestas', $respuestas)
            ->with('ps', $ps);
        }else{
            return view('test.index');
        }
    }

    public function contestar(Request $request)
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            try {

                $Respuestas = new Respuestas();
                $Respuestas->persona = $cedula;
                $Respuestas->posibles_respuesta = $request->posibles_respuesta;
                $Respuestas->pregunta = $request->pregunta;
                $Respuestas->save();
                return back()->withInput();

            } catch (Exception $e) {
            
                return back()->withInput();
            
            }

        }else{
            return view('test.index');
        }
    }

    public function inicio()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $hizo_test=DB::select("
                SELECT count(*) as c FROM b_respuestas_historic_1 WHERE persona='".$cedula."'
            ");
            foreach ($hizo_test as $h) {
                $hizo=$h->c;
            }
            return view('test.menu')->with('nombre', $nombre)->with('apellido', $apellido)->with('hizo', $hizo);
        }else{
            return view('test.index');
        }
    }

    public function registro()
    {
    	$sexo = DB::select("
            SELECT * from genero
        ");
    	$raza_etnicidad = DB::select("
            SELECT * from raza_etnicidad
        ");
    	$estado_civil = DB::select("
            SELECT * from estado_civil
        ");
    	$departamento = DB::select("
            SELECT * from departamento
        ");
        return view('test.register')
        							->with('sexo', $sexo)
        							->with('raza_etnicidad', $raza_etnicidad)
        							->with('estado_civil', $estado_civil)
        							->with('departamento', $departamento);
    }

    public function buscar_municipio($id)
    {
    	return DB::select("
            SELECT * from municipio where departamento_iddepartamento=".$id."
        ");
    }
    
    public function buscar_identificacion($id)
    {
    	return DB::select("
            SELECT count(*) as t from b_persona_categoria where cedula=".$id."
        ");
    }
    
    public function procesar_registro(Request $request)
    {
      try {
        $Persona = new Persona();
        $Persona->nombre = ucwords($request->nombre);
        $Persona->apellido =ucwords($request->apellido);
        $Persona->cedula = $request->cedula;
        $Persona->pass = $request->pass;
        $Persona->edad = $request->edad;
        $Persona->genero = $request->genero;
        $Persona->estado_civil = $request->estado_civil;
        $Persona->raza_etnicidad = $request->raza;
        $Persona->lugar_nacimiento = $request->municipio;
        $Persona->estado = 1;
        $Persona->correo = $request->correo;
        $Persona->save();
        Flash::success('Felicitaciones te has registrado!, Que esperas ingresa tu cedula y contraseña');
        return view('test.index');
      } catch (Exception $e) {
        return "error fatal ->".$e->getMessage();
      }
    }

    public function calcular()
    {

        $cedula = Session::get('estudiante');

        $cantidad_pregunta=DB::select("
            SELECT count(*) as c FROM preguntas p
        ");

        $respuestas=DB::select("
            SELECT count(*) as c FROM respuestas
            WHERE persona='".$cedula."'
        ");


        foreach ($respuestas as $r) {
            $respondidas = $r->c;
        }

        foreach ($cantidad_pregunta as $cp) {
            $total = $cp->c;
        }

        if($respondidas==$total){

            DB::select("CALL proc_historico_respuesta('".$cedula."')");

            $est=DB::select("
                SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
            ");


            foreach ($est as $e) {
                $cedula=$e->cedula;
                $nombre=$e->nombre;
                $apellido=$e->apellido;
            }
            if(count($est)==1){
                $rowdata=DB::select("
                    SELECT physical,social,financial,emotional,significance,fechaencuesta 
                    FROM b_rowdata_1 
                    WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC LIMIT 1
                ");
                return view('test.analisis')->with('rowdata', $rowdata)->with('nombre', $nombre)->with('apellido', $apellido);
            }else{
                return view('test.index');
            }

        }else{

            return redirect('/test');

        }

    }

    public function analisis()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC LIMIT 1
            ");

            return view('test.analisis')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata);
        
        }else{
            return view('test.index');
        }
    }

    public function historico()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historicos')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }
    
    public function consulta_cambio(Request $request)
    {
        return DB::select("
            SELECT * FROM detalle_historic WHERE cambio='".$request->t_cambio."' AND dimencion='".$request->t_dimension."'
        ");

    }

}
