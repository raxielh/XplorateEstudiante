@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
             <a href="{!! route('categorias.index') !!}" class="btn btn-default">Atras</a> Preguntas
        </h1>
    </section>
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row" style="padding-left: 20px">
                            @include('categorias.show_fields')
                            {!! Form::open(['route' => 'preguntas.store']) !!}

                                <!-- Descripcion Field -->
                                <div class="form-group col-sm-12 col-lg-12">
                                    {!! Form::label('descripcion', 'Pregunta:') !!}
                                    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
                                </div>

                                <input type="hidden" name="categoria" value="{!! $categoria->id !!}">
                                <input type="hidden" name="estado" value="1">
                                <input type="hidden" name="orden" value="1">

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

                        <table class="table table-responsive" id="preguntas-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Orden</th>
                                    <th style="width: 150px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="mi_lista2">
                            @foreach($preguntas as $preguntas)
                                <tr id="miorden_{!! $preguntas->id !!}">
                                    <td>{!! $preguntas->descripcion !!}</td>
                                    <td>{!! $preguntas->nombre !!}</td>
                                    <td>{!! $preguntas->orden !!}</td>
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
                    </div>
                </div>                
            </div>
        </div>

    </div>
@endsection
