<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
    <p>{!! $categoria->titulo !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', 'Desc:') !!}
    <p>{!! $categoria->desc !!}</p>
</div>

<!-- Orden Field -->
<div class="form-group">
    {!! Form::label('orden', 'Orden:') !!}
    <p>{!! $categoria->orden !!}</p>
</div>
