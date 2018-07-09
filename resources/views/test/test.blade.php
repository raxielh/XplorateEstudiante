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
    p{
      font-size: 16px;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <h3 style="text-align:right;color:#333;">{{$nombre}} {{$apellido}} <a href="/bienvenido" class="btn btn-warning">Atras</a></h3>
      <div class="row" style="background-color: #fff;padding: 2em;border-radius: 2em">
        <div class="col-md-12">
          
          <?php 
            
            foreach ($respuestas as $r) {
              $respondidas = $r->c;
            }

            foreach ($cantidad_pregunta as $cp) {
              $total = $cp->c;
            }

            if($respondidas==$total){
          
          ?>

          <div style="text-align: center;">
            <h2>
              Has terminado el test. Gracias por tu tiempo y atención en la realización de estas preguntas. Realmente apreciamos tus respuestas. En la página siguiente, recibirás información sobre tus resultados a través de distintas áreas.
            </h2>
            <a href="/calcular" class="btn btn-success">Ver resultado</a>
          </div>
          
          <?php } else{ ?>

          <form action="/contestar" id="frm" method="post">
            @csrf
          @foreach ($categorias as $c)
              
              @foreach ($pregunta as $p)
                <div id="pregunta-{{$p->id}}">
                  @if ($c->id == $p->categoria)
                  {!! $c->desc !!}
                  <h3 style="color: #4E98D2">{{ $p->descripcion }}</h3>
                  <input type="hidden" value="{{$p->id}}" name="pregunta">
                  <ul>
                  @foreach ($ps as $pos)
                    @if ($p->id == $pos->pregunta)
                    <li style="font-size: 18px">
                      <label>
                        <input type="radio" class="click" name="posibles_respuesta" value="{{ $pos->id }}"> 
                        {{ $pos->descripcion }}                   
                      </label>
                    </li>
                    @endif
                  @endforeach
                  </ul>

                  @endif
                </div>
              @endforeach
            
          @endforeach
          </form>
          <progress value="@foreach ($respuestas as $r){{ $r->c }}@endforeach" max="@foreach ($cantidad_pregunta as $cp){{ $cp->c }}@endforeach" style="width: 100%"></progress>
          <div style="text-align: center;">
            @foreach ($respuestas as $r){{ $r->c }}@endforeach / @foreach ($cantidad_pregunta as $cp){{ $cp->c }}@endforeach
          </div>

          <?php } ?>

        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $( ".click" ).click(function() {
          $( "#frm" ).submit();
        });
      });
    </script>
  </body>
</html>