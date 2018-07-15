@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Generar Datos Crudos</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="/generar_rd" method="post">
                            @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="fi">Fecha Inicio:</label>
                            <input type="date" required name="fi" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="ff">Fecha Final:</label>
                            <input type="date" required name="ff" value="<?php echo date('Y-m-d'); ?>" class="form-control">                            
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Generar" style="margin-top: 24px" class="btn btn-success">
                        </div>
                    </div>

                    
                </form>

            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

