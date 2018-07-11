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
      body{     background-color: #F9F9F9;  }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div id="login">
          <div class="row">
              <div class="col-md-12">
                <h3>Crea tu usuario y contraseña</h3>
                </div>
            </div>
          <div class="row">
              <div class="col-md-6" style="margin-bottom: 1em">
                  <p class="justificado">Por favor crea tu usuario y contraseña haciendo <a  href="/registro">clic aqui</a>, a continuación ingresa tu identificacion y contraseña para iniciar el Test. Si ya te registrastes digita tu identificacón y contraseña para ver tus resultados.
                    </p>
          <a  href="/registro" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Registrate</a><br>
                </div>
              <div class="col-md-6">
                  <div>
                        <form ACTION="{{route('entrar')}}" METHOD="POST" class="form-inline" name="login">
                          @csrf
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-male"></i></div>
                              <input type="number" class="form-control" name="cedula" required placeholder="Ingresa tu identificacion">
                              {!! $errors->first('cedula','<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                              <input type="password" class="form-control" name="pass" required placeholder="Ingresa tu contraseña">
                              {!! $errors->first('pass','<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="espacio-arriba">
                              <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> Entrar</button>
                            </div><br>
                            @include('flash::message')
                          </div>
                        </form>
                    </div>

                </div>
            </div>  
        </div>  
  </div>
  </body>
</html>