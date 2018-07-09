<!-- Descsubtitulo1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descsubtitulo1', 'Descripcion:') !!}
    {!! Form::text('descsubtitulo1', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subtitulos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
