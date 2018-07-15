<div class="row">
	<div class="col-md-3">
		<!-- Id Field -->
		<div class="form-group">
		    {!! Form::label('id', 'Id:') !!}
		    <p>{!! $subtitulo->id !!}</p>
		</div>

		<!-- Descsubtitulo1 Field -->
		<div class="form-group">
		    {!! Form::label('descsubtitulo1', 'Descripcion:') !!}
		    <p>{!! $subtitulo->descsubtitulo1 !!}</p>
		</div>
        {!! Form::open(['route' => 'subtitulo2s.store']) !!}

            @include('subtitulo2s.fields')

        {!! Form::close() !!}
	</div>
	<div class="col-md-9">
		<table class="table table-responsive" id="subtitulo2s-table">
		    <thead>
		        <tr>
		        <th>Pregunta</th>
		        <th>Variable</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    @foreach($subtitulo2s as $subtitulo2)
		        <tr>
		            <td>{!! $subtitulo2->pregunta !!}</td>
		            <td style="text-transform: none;">{!! $subtitulo2->variable !!}</td>
		            <td>
		                {!! Form::open(['route' => ['subtitulo2s.destroy', $subtitulo2->id], 'method' => 'delete']) !!}
		                <div class='btn-group'>
		                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xl', 'onclick' => "return confirm('Estas seguro?')"]) !!}
		                </div>
		                {!! Form::close() !!}
		            </td>
		        </tr>
		    @endforeach
		    </tbody>
		</table>
	</div>
</div>
