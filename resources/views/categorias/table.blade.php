<table class="table table-responsive" id="preguntas-table" style="width: 100%">
    <thead>
        <tr>
            <th>Titulo</th>
        <th>Desc</th>
        <th>Orden</th>
            <th style="width: 130px">Action</th>
        </tr>
    </thead>
    <tbody id="mi_lista">
    @foreach($categorias as $categoria)
        <tr id="miorden_{!! $categoria->id !!}">
            <td>{!! $categoria->titulo !!}</td>
            <td>{!! $categoria->desc !!}</td>
            <td>{!! $categoria->orden !!}</td>
            <td  width="10%">
                {!! Form::open(['route' => ['categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categorias.show', [$categoria->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categorias.edit', [$categoria->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>