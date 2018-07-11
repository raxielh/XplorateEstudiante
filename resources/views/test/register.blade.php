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
      body{     background-color: #F9F9F9  }
      #btn{ display: none; }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div id="login">
          <div class="row">
              <div class="col-md-12">
                  <h3>Registrarse</h3>
                </div>
            </div>
            <form method="POST" action="/procesar_registro/" name="registrarse">
                 @csrf
          <div class="row">
              <div class="col-md-6">
                  <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-male"></i></div>
                        <input type="text" class="form-control" name="nombre" required placeholder="Ingresa tu nombre">
                    </div>
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-male"></i></div>
                        <input type="text" class="form-control" name="apellido" required placeholder="Ingresa tu apellido">
                    </div>
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-male"></i></div>
                        <input type="number" class="form-control" name="cedula" id="cedula" required placeholder="Ingresa tu identificacion">
                      <!--<div id="msg" style="text-align:center" class="label label-danger">Cedula errada</div>-->
                      <!--<div id="msg2" style="text-align:center" class="label label-warning">Cedula ya Registrada</div>-->
                    </div>
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                        <input type="password" class="form-control" name="pass" required placeholder="Crea tu contraseña">
                    </div>
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input type="email" class="form-control" name="correo" required placeholder="Correo">
                    </div>
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-male"></i></div>
                        <select name="edad" class="form-control" required >
                          <option value="" selected>Busca tu edad</option>
                          <?php $x=15; while ($x<80) {?>
                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
              <?php $x=$x+1; } ?>
                        </select>
                        <input type="hidden" name="estado" value="1" required />
                    </div>                 
                </div>
              <div class="col-md-6">
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-male"></i></div>
            <select name="genero" id="" class="form-control" required>
              <option value="" selected>Busca tu sexo</option>
                      @foreach ($sexo as $d)
                         <option value="{{ $d->idgenero }}">{{ $d->nombre }}</option>
                      @endforeach

                        </select>
                    </div>  
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-child"></i></div>
            <select name="raza" id="" class="form-control" required>
              <option value="" selected>Busca tu raza/etnicidad</option>
                     @foreach ($raza_etnicidad as $d)
                         <option value="{{ $d->idraza_etnicidad }}">{{ $d->nombre }}</option>
                      @endforeach
                        </select>
                    </div>  
                     <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-child"></i></div>
            <select name="estado_civil" id="" class="form-control" required>
              <option value="" selected>Busca tu estado civil</option>
                                   @foreach ($estado_civil as $d)
                         <option value="{{ $d->idestado_civil }}">{{ $d->nombre }}</option>
                      @endforeach
                        </select>
                    </div>  
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-globe"></i></div>
            <select id="departamento"  class="form-control" required>
              <option value="" selected>Busca tu departamento</option>
                                   @foreach ($departamento as $d)
                         <option value="{{ $d->iddepartamento }}">{{ $d->nombre }}</option>
                      @endforeach
                        </select>
                    </div>                     
                    <div class="input-group espacio-arriba">
                      <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
            <select name="municipio" id="municipio" class="form-control" required>
                            <option value="" selected>Busca tu municipio</option>
                        </select>
                    </div>                                                            
                </div>
            </div>
            <hr>
          <div class="row">
              <div class="col-md-12 espacio-arriba" style="text-align:right">
                 <a href="/test" class="btn btn-danger">Cancelar</a> 
                 <button type="submit" class="btn btn-warning" id="btn">Registrate</button>
                </div>
            </div>
            </form>
        </div>  
    
  </div>
  <script>
    $(document).ready(function() {

      $("form").keypress(function(e) {
          if (e.which == 13) {
              return false;
          }
      });

  $("#cedula").keyup(function(){
        //console.log('busco... la cedula '+$("#cedula").val());
      $.getJSON( "/buscar_identificacion/"+$("#cedula").val(), function( data ) {
            
            $.each(data, function(index, val) {
              if(val.t==1){
                $("#btn").fadeIn();
              $("#msg").fadeOut();
              }else{
                $("#msg").fadeIn();
              $("#btn").fadeOut()
              }
            });


      });  
  });


       $("#departamento").change(function () {
               $("#departamento option:selected").each(function () {
                i = $(this).val();
                $('#municipio').empty();
                $.getJSON('/buscar_municipio/'+i, function(json, textStatus) {
                  $.each(json, function(index, val) {
                    $('#municipio').append("<option value='"+val.idmunicipio+"'>"+val.nombreMunicipio+"</option>");
                  });
                });   
            });
       });
    });
  </script>
  </body>
</html>