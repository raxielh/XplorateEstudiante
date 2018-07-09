@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Importar</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding: 3em">
                    {!! Form::open(
                        array(
                            'route' => 'importar', 
                            'class' => 'form', 
                            'novalidate' => 'novalidate', 
                            'files' => true)) !!}

                    <div class="form-group">
                        {!! Form::label('Archivo') !!}
                        {!! Form::file('archivo', null) !!}
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-danger" value="Procesar">
                    </div>
                    {!! Form::close() !!}
                    </div>
                    <a href="{{URL::asset('/datos/plantilla.xlsx')}}" class="btn btn-info">Desarcargar Plantilla</a>
                </div>   
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

