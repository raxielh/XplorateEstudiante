<?php 
  foreach ($rowdata as $rd) {
    $salud=$rd->physical; $social=$rd->social; $financiero=$rd->financial;
    $emocional=$rd->emotional; $significado=$rd->significance; $fecha=$rd->fechaencuesta;
  }
  
  if($salud>=4){
    $c_salud='green';
    $d_salud='Tiene un estado físico excelente y es capaz de desempeñar las actividades diarias. Continua manteniendo el buen estado físico mediante el ejercicio regular moderado, come saludablemente, duerme adecuadamente, y realiza otras actividades que encuentra útil. ';
  }
  if($salud>2 & $salud <4){
    $c_salud='yellow';
    $d_salud='Generalmente goza de buena salud física, aunque puede estar manejando dolor o padeciendo alguna afección de salud que afecte sus actividades diarias en el trabajo o en lo social. Consultar con su médico para contar con las estrategias del manejo del dolor y para apoyar las actividades cotidianas podría ser útil. Apoya su salud física mediante el ejercicio moderado regular, y come saludablemente; duerme adecuadamente, y realiza otras actividades que encuentra que ayudan a la salud. ';
  }
  if($salud<=2){
    $c_salud='red';
    $d_salud='No goza de buena salud física y esto afecta su capacidad para realizar sus actividades cotidianas. Si no ha consultado un doctor recientemente, considere recibir ayuda de un especialista o de otro profesional de la salud. Si está trabajando con un doctor, hable con él (ella) acerca de estrategias sobre cómo manejar el dolor y ayudar a que sea efectivo. El ejercicio leve,  comer saludablemente, dormir adecuadamente pueden ser un apoyo.  ';
  } 

  if($social>=4){
    $c_social='green';
    $d_social='Tiene relaciones fuertes que le brindan apoyo. Se siente cercana(o) a los demás, y está segura(o) de que sus amistades /familia estarán ahí cuando los necesite. Sigue invirtiendo en sus relaciones personales actuales – invierte tiempo en sus seres queridos; les deja saber que aprecia el apoyo recibido y los tiene como prioridad en su vida.';
  }
  if($social>2 & $social <4){
    $c_social='yellow';
    $d_social='Tiene buenas relaciones en su vida, pero quizás a veces se siente más conectada(o) y que recibe más apoyo de otros. Continúa invirtiendo en sus relaciones personales actuales – invierte tiempo en sus seres queridos; muestra su aprecio cuando otros le brindan apoyo y los hace una prioridad en la vida. También considera establecer nuevas amistades. ';
  }
  if($social<=2){
    $c_social='red';
    $d_social='Lucha con las relaciones personales de su vida, donde siente que está como desconectada(o) y no cuenta con apoyo de los demás. Las relaciones personales que le brindan apoyo son un ingrediente clave para su felicidad y bienestar. Trabaja en conectarse con los demás – invierte tiempo con la gente; muestra su aprecio cuando otros le brindan apoyo y, establecer relaciones positivas es una prioridad en su vida.';
  }   

  if($financiero>=4){
    $c_financiero='green';
    $d_financiero='Se siente bien con su estado financiero actual y tiene pocas o nada de deudas. Utiliza lo que tiene para construir un futuro mediante la inversión y tiene ahorros.  Quizás desee consultar un consejero financiero que pueda proveerle sugerencias para mantener fuerte su estado financiero.  ';
  }
  if($financiero>2 & $financiero <4){
    $c_financiero='yellow';
    $d_financiero='No tiene inquietudes sobre su estado financiero actual o sobre el nivel de deudas. Considera rastrear sus gastos y cerciorarse de que sólo gaste el dinero que posee. Quizás sea útil consultar un consejero financiero que pueda proveerle métodos para consolidar algunas de sus deudas y mejorar su estado financiero. ';
  }
  if($financiero<=2 ){ 
    $c_financiero='red';
    $d_financiero='Le inquieta su situación financiera actual y puede estar en la lucha con sus deudas.  Considera útil rastrear sus gastos y cerciorarse de que sólo gaste el dinero que posee, y se concentra en pagar las deudas. Debe consultar un consejero financiero que pueda ayudarla(o) a mejorar su estado financiero. ';
  }

  if($emocional>=4){
    $c_emocional='green';
    $d_emocional='Está satisfecha(o) con la vida y experimenta sentimientos positivos de manera regular. La investigación muestra que sentirse positivamente promueven la salud física, las buenas relaciones personales e inclusive el éxito en el trabajo. Continua participando en las actividades que lo(a) ayudan a sentirse positivo(a) y satisfecho(a) con la vida.  ';
  }
  if($emocional>2 & $emocional <4){
    $c_emocional='yellow';
    $d_emocional='Generalmente está satisfecha(o) con la vida, aunque experimenta una mezcla de emociones positivas y negativas. Según lo que está aconteciendo en la vida, los sentimientos mixtos podrían ser bastante saludables. Le apunta a las actividades que le den un sentido de satisfacción. Considere que con frecuencia experimenta emociones positivas versus negativas, y busca maneras de cambiar a experimentar mayor número de emociones positivas de manera regular. ';
  }
  if($emocional<=2 ){
    $c_emocional='red';
    $d_emocional='Está insatisfecha(o) con la vida y experimenta seguidas emociones negativas. La investigación ha demostrado que frecuentes emociones negativas está relacionado con resultados pobres en  la vida. La investigación en la psicología positiva está encontrando que las actividades positivas pueden ayudar a generar emociones positivas.  Podría ser útil visitar a un consejero para poder atender la falta de saludables emociones. ';
  }

  if($significado>=4){
    $c_significado='green';
    $d_significado='Tiene un sentido de significado, de propósito y dirección en la vida. Le contribuye a los demás y encuentra significado en lo que realiza.  Continua desempeñando actividades que apoyan el propósito propio y busca inspirar a otros, mediante su vida y sus acciones. ';
  }
  if($significado>2 & $significado <4){
    $c_significado='yellow';
    $d_significado='Tiene algún sentido de significado, de propósito y dirección en la vida aunque quizás también se pregunte en que medida las metas para su vida estén en realidad llenas de significado. Es bastante común que la gente reflexione sobre del propósito que tiene. Pueda ser útil pensar en qué actividades le brindan la mayor alegría y lo (la) hacen sentir vivo(a), y encuentra maneras de buscar esos asuntos. También pudiera considerar maneras de cómo contribuir con la vida de los demás. ';
  }
  if($significado<=2 ){
    $c_significado='red';
    $d_significado=' No tiene un sentido fuerte de significado, ni de propósito y lucha por encontrar la dirección correcta en la vida. Es bastante común que la gente reflexione sobre del propósito que tiene. Pueda ser útil pensar en qué actividades le brindan la mayor alegría y lo (la) hacen sentir vivo(a), y encuentra maneras de buscar esos asuntos. También pudiera considerar maneras de cómo contribuir con la vida de los demás. Si se encuentra sintiéndose como si la vida no tuviere significado, hable con un consejero o con un amigo en el que confía. ';
  }

?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Xplorate</title>
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.css')}}">
    <link href="{{URL::asset('/css/app2.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/sweetalert.css')}}" rel="stylesheet">
    <script src="{{URL::asset('/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
    body {
      background: url({{URL::asset('/img/bg2.jpg')}}) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;0
    } 
    #c00{margin-top: -80px; }
    #flor{padding: 1em;}
    #c0{text-align: center;}
    #c0 img{ width: 150px; transition: .4s all; }
    #c0 img:hover {-ms-transform:translate(0px, -26px);
    -webkit-transform: translate(0px, -26px);
    transform:translate(0px, -26px);}
    #c4{text-align: right;}
    #c4 img{width: 200px;transition: .4s all;}
    #c4 img:hover {-ms-transform:translate(-40px, -10px);
        -webkit-transform: translate(-40px, -10px);
        transform:translate(-40px, -10px);}
    #c1{text-align: left;}
    #c1 img{ width: 200px;transition: .4s all;}
    #c1 img:hover {-ms-transform:translate(30px, -10px);
    -webkit-transform: translate(30px, -10px);
    transform:translate(30px, -10px);}
    #c3{text-align: right;}
    #c3 img{width: 160px;transition: .4s all;}
    #c3 img:hover {-ms-transform:translate(-30px, 10px);
        -webkit-transform: translate(-30px, 10px);
        transform:translate(-30px, 10px);}
    #c2{text-align: left;}
    #c2 img{width: 160px;transition: .4s all;}
    #c2 img:hover {-ms-transform:translate(30px, 0px);
               -webkit-transform: translate(30px, 0px);
                transform:translate(30px, 0px);}
    .modal-dialog{
      z-index: 99999999;
    }
    </style>
<style>
@media (max-width: 600px) {
  #flor,.oculto {
    display: none;
  }
}
</style>
  </head>
  <body>
    <div class="container">
      <h3 style="text-align:right;color:#333;">Tu analisis {{$nombre}} {{$apellido}} 
        <a href="/inicio" class="btn btn-warning">Atras</a>
        <a href="/salir" class="btn btn-danger">Salir</a>
      </h3>
      <div class="row" style="background-color: #fff;padding: 2em;border-radius: 2em;padding-bottom: 5em">
        <div style="text-align: right;"><a class="btn btn-info" href="/historico"><i class="glyphicon glyphicon-calendar"></i> Grafico Historico</a></div>
        <div class="col-md-12">
          <div id="flor" class="row">    

            <div class="col-md-4"></div>
            
            <div id="c0"  data-toggle="modal" class="col-md-4">
              <img data-toggle="modal"  src="{{URL::asset('/img/flor/base1.png')}}" data-target="#cero" >
            </div>
            
            <div class="col-md-4"></div>
            
            <div id="c00" class="col-md-12">
              <div id="c4" class="col-md-6">
                <img data-toggle="modal"  src="{{URL::asset('/img/flor/base5.png')}}" data-target="#cuarto">
              </div>
              <div id="c1" data-toggle="modal" class="col-md-6">
                <img data-toggle="modal"  src="{{URL::asset('/img/flor/base2.png')}}" data-target="#primero">
              </div>
              <div id="c3" data-toggle="modal" class="col-md-6">
                <img data-toggle="modal"  src="{{URL::asset('/img/flor/base4.png')}}" data-target="#tercero">
              </div>
              <div id="c2"  data-toggle="modal"  class="col-md-6">
                <img data-toggle="modal"  src="{{URL::asset('/img/flor/base3.png')}}" data-target="#segundo">
              </div>
            </div>
          </div>
          <p style="text-align:center;margin-top: 1em;" class="oculto">Haga clic en cada dimensión para conocerte.</p>
          <div id="chart_div"></div>
          <h3>Relaciones Sociales</h3>
          <p>{{$d_social}}</p>
          <h3>Estado Fisico</h3>
          <p>{{$d_salud}}</p>
          <h3>Estado Financiero</h3>
          <p>{{$d_financiero}}</p>
          <h3>Estado Emocional</h3>
          <p>{{$d_emocional}}</p>
          <h3>Proposito</h3>
          <p>{{$d_significado}}</p>
        </div>
      </div>
    </div>

  <div class="modal fade" id="tercero" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Relaciones Sociales</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_social!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cero" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Proposito</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_significado!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cuarto" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Estado Fisico</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_salud!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="primero" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Estado Financiero </h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_financiero!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="segundo" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Estado Emocional</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_emocional!!}</p>
        </div>
      </div>
    </div>
  </div>


    <script>

    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawColColors);

    function drawColColors() {

          var data = google.visualization.arrayToDataTable([
            ["Element", "Valor", { role: "style" } ],
            ['Relaciones Sociales', {!!$social!!},'{!!$c_social!!}'],
            ['Estado Fisico ',{!!$salud!!},'{!!$c_salud!!}'],
            ['Estado Financiero ',{!!$financiero!!},'{!!$c_financiero!!}'],
            ['Estado Emocional  ',{!!$emocional!!},'{!!$c_emocional!!}'],
            ['Proposito',{!!$significado!!},'{!!$c_significado!!}']
          ]);

          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);
        
          var options = {
            title: "Resultado Grafico",
            width: '100%',
            height: 400,
            bar: {groupWidth: '95%'},
            vAxis: {
              scaleType: 'mirrorLog',
              ticks: [1,1.2,1.5,2,2.5,3,3.5,4,4.5,5],
              format:'short'
            },
            legend: { position: "none" },
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(view, options);
          
        }

    $(window).resize(function(){
      drawColColors();
    });


    </script>
  </body>
</html>