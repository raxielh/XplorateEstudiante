<?php 

  $S_salud=null;
  $S_social=null;
  $S_financiero=null;
  $S_emocional=null;
  $S_significado=null;

  foreach ($rowdata_h as $rdh) {
    $salud=$rdh->physical;
    $social=$rdh->social;
    $financiero=$rdh->financial;
    $emocional=$rdh->emotional;
    $significado=$rdh->significance;
    $fecha=$rdh->fechaencuesta;

    if($salud>=4){
      $c_salud='verde';
    }
    if($salud>2 & $salud <4){
      $c_salud='amarillo';
    }
    if($salud<=2){
      $c_salud='rojo';
    } 
    $S_salud=$S_salud.$c_salud;

    if($social>=4){
      $c_social='verde';
    }
    if($social>2 & $social <4){
      $c_social='amarillo';
    }
    if($social<=2){
      $c_social='rojo';
    }   
    $S_social=$S_social.$c_social;
  
    if($financiero>=4){
      $c_financiero='verde';
    }
    if($financiero>2 & $financiero <4){
      $c_financiero='amarillo';
    }
    if($financiero<=2 ){ 
      $c_financiero='rojo';
    }
    $S_financiero=$S_financiero.$c_financiero;

    if($emocional>=4){
      $c_emocional='verde';
    }
    if($emocional>2 & $emocional <4){
      $c_emocional='amarillo';
    }
    if($emocional<=2 ){
      $c_emocional='rojo';
    }
    $S_emocional=$S_emocional.$c_emocional;

    if($significado>=4){
      $c_significado='verde';
    }
    if($significado>2 & $significado <4){
      $c_significado='amarillo';
    }
    if($significado<=2 ){
      $c_significado='rojo';
    }
    $S_significado=$S_significado.$c_significado;

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
    </style>
  </head>
  <body>
    <div class="container">
      <h3 style="text-align:right;color:#333;">Tu analisis {{$nombre}} {{$apellido}} 
        <a href="/analisis" class="btn btn-warning">Atras</a>
        <a href="/salir" class="btn btn-danger">Salir</a>
      </h3>
      <div class="row" style="background-color: #fff;padding: 2em;border-radius: 2em;padding-bottom: 5em">
        <div class="col-md-12">
          <div id="chart_div"></div>
          
          <h2 style="color: #4285f4;" id="tt_social"></h2>
          <p style="font-size: 16px;padding: 1em;" id="t_social"></p>
          
          <h2 style="color: #db4437;" id="tt_physical"></h2>
          <p style="font-size: 16px;padding: 1em;" id="t_physical"></p>

          <h2 style="color: #0f9d58;" id="tt_emotional"></h2>
          <p style="font-size: 16px;padding: 1em;" id="t_emotional"></p>

          <h2 style="color: #f4b400;" id="tt_financial" ></h2>
          <p style="font-size: 16px;padding: 1em;" id="t_financial"></p>

          <h2 style="color: #ab47bc;" id="tt_sentido_significado_proposito"></h2>
          <p style="font-size: 16px;padding: 1em;" id="t_sentido_significado_proposito"></p>



        </div>
      </div>
    </div>

    <script>
      
      $(function() {
        cargar_cambio1('{!!$S_social!!}','social');
        cargar_cambio2('{!!$S_salud!!}','physical');
        cargar_cambio3('{!!$S_financiero!!}','financial');
        cargar_cambio4('{!!$S_emocional!!}','emotional');
        cargar_cambio5('{!!$S_significado!!}','sentido_significado_proposito');
      });

      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fechas de realizacion del test');
      data.addColumn('number', 'Relaciones Sociales');
      data.addColumn('number', 'Salud Física');
      data.addColumn('number', 'Bienestar Financiero');
      data.addColumn('number', 'Bienestar Emocional');
      data.addColumn('number', 'Propósito');
    
      datos = [
      <?php
        foreach ($rowdata as $rd){ 
          echo "['".$rd->fechaencuesta."',".$rd->social.",".$rd->physical.",".$rd->financial.",".$rd->emotional.",".$rd->significance."],";
        }
      ?>
      ];

      data.addRows(datos);

      var options = {
        chart: {
          title: 'Grafico Historico',
          subtitle: 'Grafica que representa historicamente tus resultados en las 5 dimensiones'
        },
        axes: {
            y: {
                all: {
                    range: {
                        max: 5,
                        min: 1             
                    }
                }
            }
        },
        width: '100%',
        height: 500
      };

      var chart = new google.charts.Line(document.getElementById('chart_div'));

      chart.draw(data, options);
    }   

    function cargar_cambio1(cambio,dimension){
      $.getJSON('/consulta_cambio', {t_cambio:cambio,t_dimension:dimension}, function(json){
        $.each(json, function( key, value ) {
          console.log(value);
          $('#tt_social').text(value.titulo);
          $('#t_social').text(value.texto);
        });
      });
    }
    function cargar_cambio2(cambio,dimension){
      $.getJSON('/consulta_cambio', {t_cambio:cambio,t_dimension:dimension}, function(json){
        $.each(json, function( key, value ) {
          console.log(value);
          $('#tt_physical').text(value.titulo);
          $('#t_physical').text(value.texto);
        });
      });
    }
    function cargar_cambio3(cambio,dimension){
      $.getJSON('/consulta_cambio', {t_cambio:cambio,t_dimension:dimension}, function(json){
        $.each(json, function( key, value ) {
          console.log(value);
          $('#tt_financial').text(value.titulo);
          $('#t_financial').text(value.texto);
        });
      });
    }
    function cargar_cambio4(cambio,dimension){
      $.getJSON('/consulta_cambio', {t_cambio:cambio,t_dimension:dimension}, function(json){
        $.each(json, function( key, value ) {
          console.log(value);
          $('#tt_emotional').text(value.titulo);
          $('#t_emotional').text(value.texto);
        });
      });
    }
    function cargar_cambio5(cambio,dimension){
      $.getJSON('/consulta_cambio', {t_cambio:cambio,t_dimension:dimension}, function(json){
        $.each(json, function( key, value ) {
          console.log(value);
          $('#tt_sentido_significado_proposito').text(value.titulo);
          $('#t_sentido_significado_proposito').text(value.texto);
        });
      });
    }

  </script>
  </body>
</html>