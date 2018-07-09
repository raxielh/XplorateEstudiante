<table class="table_d table table-responsive" id="preguntas-table" style="width: 100%">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Estado</th>
        <th>Orden</th>
        <th>Categoria</th>
            <th style="width: 130px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($preguntas as $preguntas)
        <tr>
            <td>{!! $preguntas->descripcion !!}</td>
            <td>{!! $preguntas->estado !!}</td>
            <td>{!! $preguntas->orden !!}</td>
            <td>{!! $preguntas->categoria !!}</td>
            <td>
                {!! Form::open(['route' => ['preguntas.destroy', $preguntas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('preguntas.show', [$preguntas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('preguntas.edit', [$preguntas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>