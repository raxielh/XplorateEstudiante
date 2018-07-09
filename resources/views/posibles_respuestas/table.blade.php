<table class="table table-responsive" id="posiblesRespuestas-table">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Pregunta</th>
        <th>Orden</th>
        <th>Valor</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($posiblesRespuestas as $posiblesRespuestas)
        <tr>
            <td>{!! $posiblesRespuestas->descripcion !!}</td>
            <td>{!! $posiblesRespuestas->pregunta !!}</td>
            <td>{!! $posiblesRespuestas->orden !!}</td>
            <td>{!! $posiblesRespuestas->valor !!}</td>
            <td>
                {!! Form::open(['route' => ['posiblesRespuestas.destroy', $posiblesRespuestas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('posiblesRespuestas.show', [$posiblesRespuestas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('posiblesRespuestas.edit', [$posiblesRespuestas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>