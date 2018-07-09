<table class="table table-responsive" id="subtitulo2s-table">
    <thead>
        <tr>
            <th>Idsubtitulo2</th>
        <th>Pregunta</th>
        <th>Variable</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subtitulo2s as $subtitulo2)
        <tr>
            <td>{!! $subtitulo2->idsubtitulo2 !!}</td>
            <td>{!! $subtitulo2->pregunta !!}</td>
            <td>{!! $subtitulo2->variable !!}</td>
            <td>
                {!! Form::open(['route' => ['subtitulo2s.destroy', $subtitulo2->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subtitulo2s.show', [$subtitulo2->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subtitulo2s.edit', [$subtitulo2->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>