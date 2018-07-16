<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\RowData;
use Session;
use Flash;
use Exception;

class ReportesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function v_generar_rd()
    {
        return view('reportes.generar_rd');
    }



    public function generar_rd(Request $request)
    {
        $sql="
SELECT

  pe.idpersona,
  pe.nombre,
  pe.apellido,
  pe.cedula,
  pe.genero,
  g.nombre descgenero,
  pe.estado_civil,
  ec.nombre descestadocivil,
  pe.raza_etnicidad,
  re.`nombre` descraza_etnicidad,
  pe.lugar_nacimiento,
  mu.`nombreMunicipio`  nacimientoMunicipio,
  de.`nombre` nacimientodepartamento,
  pe.correo,
pc.tipoempleado,
pc.acad_prog,
pc.cargo,
pc.campus,
rh1.fechaencuesta,
rh1.respuestas_historic_1,
   ca.desc desccategoria,
   ca.titulo titulocategoria,
   ca.orden ordecategoria,
  pr.id idpregunta,
  pr.descripcion descpregunta,
  pr.orden ordenpregunta,
pre.id idrespuesta,
pre.descripcion descrespuesta,
pre.orden ordenrepuesta,
pre.valor valorespuesta

FROM 
  preguntas pr,
  categoria ca,
  posibles_respuestas pre,
  b_respuestas_historic_2 rh2,
   b_respuestas_historic_1 rh1,
  b_persona_categoria pc,
  persona pe,
  genero g,
  estado_civil ec,
  raza_etnicidad re,
  municipio mu,
  `departamento` de
  
  
  where pr.estado=1
  and pr.categoria=ca.id
  and pr.id=pre.pregunta
  and pre.pregunta=rh2.pregunta
  and pre.id=rh2.posibles_respuesta
  and rh2.respuestas_historic_1=rh1.respuestas_historic_1
  and rh2.persona=rh1.persona
  and rh1.persona=pc.cedula
  and rh1.persona=pe.cedula
  and pe.genero=g.idgenero
  and pe.estado_civil=ec.idestado_civil
  and pe.`raza_etnicidad`=re.`idraza_etnicidad`
  and pe.`lugar_nacimiento`=mu.`idmunicipio`
  and mu.`departamento_iddepartamento`=de.`iddepartamento`
  and rh1.fechaencuesta between '$request->fi 00:00:01' and '$request->ff 23:59:59' 
  order by rh1.fechaencuesta,rh1.respuestas_historic_1, pe.cedula,ca.orden, pr.orden,pre.orden;";
            Excel::create("Datos Crudos", function ($excel) use ($sql) {
                set_time_limit(0);
                $excel->setTitle("Title");
                $excel->sheet("Sheet 1", function ($sheet) use ($sql) {
                    $persona=DB::select($sql);
                    $persona= json_decode( json_encode($persona), true);
                    $data = $persona;
                    $sheet->fromArray($data);
                });
            })->export('xls');
    }

    public function vista_cht()
    {
        return view('reportes.vista_cht');
    }

    public function generar_cht(Request $request)
    {
        $sql="
SELECT ap.acad_prog, ap.acad_prog_desc, rw1.semestre_estudiante, COUNT( * ) as total
        FROM  `b_rowdata_1` rw1,  
              `b_rowdata_3` r3, 
             b_persona_categoria pc, 
             ps_acad_prog ap,
             b_respuestas_historic_1 rh,
            municipio mu,
            departamento de,
             persona pe
        WHERE pc.cedula = rw1.persona
        AND rw1.persona = r3.persona
                 AND rw1.respuestas_historic_1=r3.respuestas_historic_1
          and pe.cedula=rh.persona
         and pe.lugar_nacimiento=mu.idmunicipio 
                 and mu.departamento_iddepartamento=de.iddepartamento
        and rh.respuestas_historic_1=rw1.respuestas_historic_1
        AND pc.acad_prog = ap.acad_prog
        and rw1.soporte is not null 
and pc.campus='$request->s_campus'
and rh.fechaencuesta between '$request->fi 00:00:01' and '$request->ff 23:59:59'         
GROUP BY ap.acad_prog, ap.acad_prog_desc, rw1.semestre_estudiante  ";
            Excel::create("Como vamos", function ($excel) use ($sql) {
                set_time_limit(0);
                $excel->setTitle("Title");
                $excel->sheet("Sheet 1", function ($sheet) use ($sql) {
                    $persona=DB::select($sql);
                    $persona= json_decode( json_encode($persona), true);
                    $data = $persona;
                    $sheet->fromArray($data);
                });
            })->export('xls');
    }

    public function v_generar_cd()
    {
        return view('reportes.generar_cd');
    }


    public function generar_cd(Request $request)
    {
        $sql="
SELECT
  pe.idpersona,
  pe.nombre,
  pe.apellido,
  pe.cedula,
  pe.edad,
  pe.genero,
  ge.nombre desc_genero,
  pe.estado_civil,
  ec.nombre AS desc_estado_civil,
  pe.raza_etnicidad,
  re.nombre desc_raza_etnicidad,
  pe.lugar_nacimiento idMunicipio,
  mu.nombreMunicipio,
  mu.departamento_iddepartamento idDepartamento,
  de.nombre nombreDepartamento,
  rh.fechaencuesta,
  rw1.*,
  rw2.*,
  rw3.*,
  pc.persona_categoria,
  pc.cedula,
  pc.tipoempleado,
  tem.desctipoempleado,
  pc.acad_prog,
  ap.acad_prog_desc,
  pc.cargo,
  pc.campus,
  cam.descr descr_campus
FROM persona pe,
     estado_civil ec,
     genero ge,
     raza_etnicidad re,
     municipio mu,
     departamento de,
     b_respuestas_historic_1 rh,
     b_rowdata_1 rw1,
     b_rowdata_2 rw2,
     b_rowdata_3 rw3,
     b_persona_categoria pc,
     ps_acad_prog ap,
     b_tipoempleado tem,
     ps_campus cam
WHERE pe.estado_civil = ec.idestado_civil
AND pe.genero = ge.idgenero
AND pe.raza_etnicidad = re.idraza_etnicidad
AND pe.lugar_nacimiento = mu.idmunicipio
AND mu.departamento_iddepartamento = de.iddepartamento
AND pe.cedula = rh.persona
AND rh.respuestas_historic_1 = rw1.respuestas_historic_1
AND rh.respuestas_historic_1 = rw2.respuestas_historic_1
AND rh.respuestas_historic_1 = rw3.respuestas_historic_1
AND pe.cedula = pc.cedula
AND pc.acad_prog = ap.acad_prog
AND pc.tipoempleado = tem.tipoempleado
AND pc.campus = cam.campus
AND pc.campus = '$request->s_campus'
AND rh.fechaencuesta BETWEEN '$request->fi 00:00:01' and '$request->ff 23:59:59'  
";
            Excel::create("Datos_Computo", function ($excel) use ($sql) {
                set_time_limit(0);
                $excel->setTitle("Title");
                $excel->sheet("Sheet 1", function ($sheet) use ($sql) {
                    $persona=DB::select($sql);
                    $persona= json_decode( json_encode($persona), true);
                    $data = $persona;
                    $sheet->fromArray($data);
                });
            })->export('xls');
    }

}
