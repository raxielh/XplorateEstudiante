<!-- Idsubtitulo2 Field
<div class="form-group col-sm-6">
    {!! Form::label('idsubtitulo2', 'Idsubtitulo2:') !!}
    {!! Form::number('idsubtitulo2', null, ['class' => 'form-control']) !!}
</div>-->
<input name="idsubtitulo2" type="hidden" id="idsubtitulo2" value="{!! $subtitulo->id !!}">
<!-- Pregunta Field -->
<div class="form-group col-sm-12">
    {!! Form::label('pregunta', 'Pregunta:') !!}
    {!! Form::select('pregunta', $preguntas, null, ['class' => 'form-control']) !!}
</div>

<!-- Variable Field -->
<div class="form-group col-sm-12">
    {!! Form::label('variable', 'Variable:') !!}
    {!! Form::text('variable', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>
