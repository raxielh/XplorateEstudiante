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
    .menu1{
      margin: 9em;
    }
.menu {
    background-color: #fff;
    margin-left: auto;
    margin-right: auto;
    margin-top: 2em;
    padding-top: 40px;
    width: 250px;
    height: 250px;
    border-radius: 250px;
    -webkit-transition: all 1s;
    transition: all 1s;
}
  @media (max-width: 500px) {
    .menu1{
    margin: 0px !important;
  }
    </style>
  </head>
  <body>
    <div class="container">
      <h3 style="text-align:right;color:#333;">Hola, {{$nombre}} {{$apellido}} <a href="/salir" class="btn btn-danger">Salir</a></h3>
      <div class="row menu1">
        <div class="col-md-6">
          <div class="menu">
              <a href="/bienvenido" class="menu-li">
                        <div class="foto" style="width: 176px; margin: 0px auto;">
                          <img src="{{URL::asset('/img/resume.png')}}" class="menu-img" data-img-name="resume" alt="">
                        </div>
                        <div style="text-align:center;font-size:16px">Test</div>
                    </a>              
          </div>
        
        </div>
        @if ($hizo === 0)
        @else
        <div class="col-md-6">
          <div class="menu">
              <a href="/analisis" class="menu-li">
                        <div class="foto" style="width: 176px; margin: 0px auto;">
                          <img src="{{URL::asset('/img/portfolio.png')}}" class="menu-img" data-img-name="portfolio" alt="">
                        </div>
                        <div style="text-align:center;font-size:16px">Mi Analisis</div>
                    </a> 
          </div>           
        </div>
        @endif

      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('.menu-img').hover(function() {

            var $div = $(this);
            var img = document.createElement('img');
            var img_name = $div.attr("data-img-name");
            img.src = "img/" + img_name + ".gif?t=" + new Date().getTime();

            $(img).load(function(){
                $div.attr("src",img.src);
            });

        }, function(){

            var $div = $(this);
            var img_name = $div.attr("data-img-name");
            var src = "img/" + img_name + ".png";
            $div.attr("src",src);

        });
      });
    </script>
  </body>
</html>