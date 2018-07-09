{!! Form::open(['route'=>'usuarios.index','method'=>'GET','class'=>'navbar-form pull-right','role'=>'search']) !!}
    <div class="form-group">
        <input type="text" name="campo" class="form-control" autofocus placeholder="Buscar..." value="{{ @$_GET['campo'] }}">
    </div>
    <button type="submit" class="btn btn-success">Buscar</button>
{!! Form::close() !!}

<table class="table1 table-responsive table-striped" id="usuarios-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Correo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{!! $usuario->name !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>
                {!! Form::open(['route' => ['usuarios.destroy', $usuario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usuarios.show', [$usuario->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('usuarios.edit', [$usuario->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$usuarios->render()}}