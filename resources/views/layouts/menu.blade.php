<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="/home"><i class="fa fa-home"></i><span> Inicio</span></a>
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
    <a href="{!! route('vista_generar_rd') !!}"><i class="fa fa-edit"></i><span>Generar RowData
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
    <a href="/web/wp-admin"><i class="fa fa-edit"></i><span>Pagina Web
</span></a>
</li>