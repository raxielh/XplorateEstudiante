<!-- Idsubtitulo2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idsubtitulo2', 'Idsubtitulo2:') !!}
    {!! Form::number('idsubtitulo2', null, ['class' => 'form-control']) !!}
</div>

<!-- Pregunta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pregunta', 'Pregunta:') !!}
    {!! Form::number('pregunta', null, ['class' => 'form-control']) !!}
</div>

<!-- Variable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('variable', 'Variable:') !!}
    {!! Form::text('variable', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subtitulo2s.index') !!}" class="btn btn-default">Cancelar</a>
</div>
