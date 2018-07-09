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
      <h3 style="text-align:right;color:#333;">{{$nombre}} {{$apellido}} <a href="/inicio" class="btn btn-warning">Atras</a></h3>
      <div class="row" style="background-color: #fff;padding: 2em;border-radius: 2em">
              <div class="col-md-12">
                    <h2>Bienvenido a <strong><span style="color:#F00">X</span>plorate</strong> </h2><hr>
                    <p style="text-align:justify">En esta encuesta,  encontrarás preguntas acerca de tu salud y bienestar y expresarás tus opiniones acerca del lugar en el que trabajas. Hacer el test te tomará aproximadamente 30 minutos. </p><p style="text-align:justify;" >
                    <strong>Puedes parar en cualquier momento, tu información y respuestas  son guardadas automáticamente, pero no olvides regresar para que puedas obtener tus resultados.</strong></p><p style="text-align:justify">
                    Tus respuestas son <strong>confidenciales</strong> y sólo se utilizarán para propósitos de investigación. Sólo se informarán datos grupales y <strong>ningún individuo es identificable</strong>. Así que relájate y aprovecha para ser sincero; entre más honesto seas, mejor te conocerás. </p><p>
                    De antemano, gracias por tu valiosa participación.</p><hr>
                    <?php 
                      foreach ($res as $r) {
                        $c=$r->c;
                      }
                    ?>
                    <div style="text-align: center;">
                        <a href="/test" id="btn" class="btn btn-success"><span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        <?php if($c==0){ ?>
                          Comenzar
                        <?php } else{  ?>
                          Continuar
                        <?php } ?>
                        </a>
                        <a href="/inicio" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</a>
                    </div>
              </div>
      </div>
    </div>
  </body>
</html>