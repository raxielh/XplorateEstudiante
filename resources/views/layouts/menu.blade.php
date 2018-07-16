<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-home"></i><span> Inicio</span></a>
</li>
<li class="{{ Request::is('souvenir*') ? 'active' : '' }}">
    <a href="{!! route('souvenir') !!}"><i class="fa fa-edit"></i><span>Souvenir
</span></a>
</li>
<li class="{{ Request::is('usuarios*') ? 'active2' : '' }}">
    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-gears"></i><span> Usuarios</span></a>
</li>

<li class="{{ Request::is('estados*') ? 'active' : '' }}">
    <a href="{!! route('estados.index') !!}"><i class="fa fa-edit"></i><span>Estados</span></a>
</li>

<li class=" {{ Request::is('categorias*') ? 'active' : '' }}
			{{ Request::is('preguntas*') ? 'active' : '' }}
			{{ Request::is('posiblesRespuestas*') ? 'active' : '' }}
">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>Test</span></a>
</li><li class="{{ Request::is('subtitulos*') ? 'active' : '' }}{{ Request::is('subtitulo2s*') ? 'active' : '' }}">
    <a href="{!! route('subtitulos.index') !!}"><i class="fa fa-edit"></i><span>Variables</span></a>
</li>

<li class="{{ Request::is('vista_generar_rd*') ? 'active' : '' }}">
    <a href="{!! route('vista_generar_rd') !!}"><i class="fa fa-edit"></i><span>Generar Datos Crudos
</span></a>
</li>

<li class="{{ Request::is('vista_generar_cd*') ? 'active' : '' }}">
    <a href="{!! route('vista_generar_cd') !!}"><i class="fa fa-edit"></i><span>Generar Datos Computo
</span></a>
</li>

<li class="{{ Request::is('vista_cht*') ? 'active' : '' }}">
    <a href="{!! route('vista_cht') !!}"><i class="fa fa-edit"></i><span>Cuantos Hicieron el Test
</span></a>
</li>
<li class="{{ Request::is('importar*') ? 'active' : '' }}">
    <a href="{!! route('importar') !!}"><i class="fa fa-edit"></i><span>Importar
</span></a>
</li>

<li>
<form name="loginform" id="loginform" action="http://127.0.0.1:8000/web/wp-login.php" method="post">
    <input type="hidden" name="log" id="user_login" class="input" value="admin" size="20">
    <input type="hidden" name="pwd" id="user_pass" class="input" value="123456" size="20">
    <center><input type="submit" style="text-align: center;" name="wp-submit" id="wp-submit" class="btn btn-default" value="Entrar a Wordpress"></center>
    <input type="hidden" name="redirect_to" value="http://127.0.0.1:8000/web/wp-admin/">
    <input type="hidden" name="testcookie" value="1">
</form>
</li>