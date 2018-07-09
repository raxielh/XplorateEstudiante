<table class="table table-responsive" id="subtitulos-table">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subtitulos as $subtitulo)
        <tr>
            <td>{!! $subtitulo->descsubtitulo1 !!}</td>
            <td>
                {!! Form::open(['route' => ['subtitulos.destroy', $subtitulo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subtitulos.show', [$subtitulo->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subtitulos.edit', [$subtitulo->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>