@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @if($posiblesRespuestas)
            <a href="/categorias/{{$posiblesRespuestas[0]->categoria}}" class="btn btn-default">Atras</a>
            @else
            <a href="javascript:history.back(1)" class="btn btn-default">Atras</a>
            @endif Posibles Respuestas
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row" style="padding-left: 20px">
                            @include('preguntas.show_fields')
                            {!! Form::open(['route' => 'posiblesRespuestas.store']) !!}

                                <!-- Descripcion Field -->
                                <div class="form-group col-sm-12 col-lg-12">
                                    {!! Form::label('descripcion', 'Descripcion:') !!}
                                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Pregunta Field -->
                                <input type="hidden" name="pregunta" value="{!! $preguntas->id !!}">

                                <!-- Orden Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('orden', 'Orden:') !!}
                                    {!! Form::number('orden', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Valor Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('valor', 'Valor:') !!}
                                    {!! Form::number('valor', null, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Submit Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                                </div>


                            {!! Form::close() !!}                              
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row" style="padding-left: 20px">
<table class="table table-responsive" id="posiblesRespuestas-table">
    <thead>
        <tr>
            <th>Descripcion</th>
        <th>Orden</th>
        <th>Valor</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody  id="mi_lista3">
    @foreach($posiblesRespuestas as $posiblesRespuestas)
        <tr id="miorden_{!! $posiblesRespuestas->id !!}">
            <td>{!! $posiblesRespuestas->descripcion !!}</td>
            <td>{!! $posiblesRespuestas->orden !!}</td>
            <td>{!! $posiblesRespuestas->valor !!}</td>
            <td>
                {!! Form::open(['route' => ['posiblesRespuestas.destroy', $posiblesRespuestas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('posiblesRespuestas.edit', [$posiblesRespuestas->id]) !!}" class='btn btn-default btn-xl'><i class="glyphicon glyphicon-edit"></i></a>
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
                </div>
          
        </div>
        </div>
    </div>
@endsection
